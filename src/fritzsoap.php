<?php

namespace blacksenator\fritzsoap;

/**
  * The class provides functions to read and manipulate
  * data via TR-064 interface on FRITZ!Box router from AVM:
  * - phonebook related data (mostly)
  * - network (mesh) data (currently just one)
  * - to be continued...
  *
  * With the instantiation of the class, all available
  * services of the addressed FRITZ!Box are determined.
  * The service parameters and available actions are
  * provided in a compressed form as XML and can be output
  * with getServiceDescription().
  * The matching SOAP client only needs to be called with
  * the name of the services <services name = "..."> and
  * gets the correct location and uri from the XML
  * (see getFritzBoxServices() for details)
  *
  * Example:
  * $fritzbox = new fritzsoap($url, $user, $password);
  * // if you wanna know your avalaible services:
  * $services = $fritzbox->getServiceDescription();
  * $services->asXML('services.xml');
  * // after you got the name (if you do not already know it):
  * $fritzbox->getClient('hosts');
  * // function names are usually equal to actions:
  * $meshList = $fritzbox->getMeshListPath();
  *
  * @author Volker Püschel <knuffy@anasco.de>
  * @copyright Volker Püschel 2019
  * @license MIT
 **/

use \SimpleXMLElement;
use blacksenator\fbvalidateurl\fbvalidateurl;

class fritzsoap
{
    const SERVICE_DESCRIPTIONS = [         // see: https://boxmatrix.info/wiki/XML-Files ('*desc.xml (static)')
        'tr64desc.xml',
        'igddesc.xml',
        'avmnexusdesc.xml',
        'fboxdesc.xml',
        'GPMDevDesc.xml',
        'igd2desc.xml',
        'MediaRendererDevDesc.xml',
        'MediaServerDevDesc.xml',
        'onlinestoredesc.xml',
        'satipdesc.xml',
        'TMediaCenterDevDesc.xml',
        'usbdesc.xml',
        ];

    /** @var SimpleXMLElement */
    private $services;

    private $url = [];
    private $serverAdress;
    private $user;
    private $password;
    private $client = null;
    private $errorCode;
    private $errorText;

    /**
     * instantiation
     *
     * @param string $url
     * @param string $user
     * @param string $password
     * @return void
     */
    public function __construct($url, $user, $password)
    {
        $validator = new fbvalidateurl;
        $this->url = $validator->getValidURL($url);
        $this->user = $user;
        $this->password = $password;
        if ($this->url['scheme'] == 'http') {
            $this->serverAdress = 'http://' . $this->url['host'] . ':49000';
        } elseif ($this->url['scheme'] == 'https') {
            $this->serverAdress = 'https://' . $this->url['host'] . ':49443';
        } else {
            error_log ('Could not assamble valid server adress!');
        }
        $this->services = $this->getFritzBoxServices();
    }

    /**
     * get all available services and their actions from the FRITZ!Box
     * in a condenzed XML:
     *  <?xml version="1.0"?>
     *  <tr064>
     *      <services name = "x_contact">
     *         <service>urn:dslforum-org:service:X_AVM-DE_OnTel:1</service>
     *         <location>/upnp/control/x_contact</location>
     *         <actions>
     *             <action>GetInfo</action>
     *             <action>...</action>
     *          </actions>
     *      </services>
     *      ...
     *  </tr064>
     *
     * @return SimpleXMLElement
     */
    private function getFritzBoxServices() : SimpleXMLElement
    {
        $tr064 = new SimpleXMLElement('<tr064 />');
        foreach (self::SERVICE_DESCRIPTIONS as $description) {
            $serviceHeaders = $this->getServiceXML($this->serverAdress . '/' . $description, 'service');
            foreach ($serviceHeaders as $serviceHeader) {
                $services = $tr064->addChild('services');
                $name = explode('/', $serviceHeader->controlURL);
                $services->addAttribute('name', $name[3]);
                $services->addChild('service', (string)$serviceHeader->serviceType);
                $services->addChild('location', (string)$serviceHeader->controlURL);
                $actionsDesc = $this->getServiceXML($this->serverAdress . $serviceHeader->SCPDURL, 'action');
                $actions = $services->addChild('actions');
                foreach ($actionsDesc as $actionDesc) {
                    $action = $actions->addChild('action', (string)$actionDesc->name);
                    /* the following more detailed view is currently not necessary (but executable)
                     * so, if you want to use it: comment the line above and uncomment the following
                     */
                    /*
                    $action = $actions->addChild('action');
                    $action->addAttribute('name', (string)$actionDesc->name);
                    if (!property_exists($actionDesc, 'argumentList')) {
                        continue;
                    }
                    foreach ($actionDesc->argumentList->argument as $attribute) {
                        $argument = $action->addChild('argument', (string)$attribute->name);
                        $argument->addAttribute('direction', (string)$attribute->direction);
                        $argument->addAttribute('relatedStateVariable', (string)$attribute->relatedStateVariable);
                    }
                    */
                }
            }
        }

        return $tr064;
    }

    /**
     * get searched node from description XML
     *
     * @param string $xmlFile
     * @param string $node
     * @return array
     */
    private function getServiceXML(string $xmlFile, string $node)
    {
        $result = [];
        $xml = @simplexml_load_file($xmlFile);
        if ($xml != false) {
            $xml->registerXPathNamespace('fb', $xml->getNameSpaces(false)[""]);
            $result = $xml->xpath("//fb:$node");
        }

        return $result;
    }

    /**
     * get the determined services
     *
     * @return SimpleXMLElement
     */
    public function getServiceDescription() : SimpleXMLElement
    {
        return $this->services;
    }

    /**
     * get the validated URL parameters
     *
     * @return array
     */
    public function getURL()
    {
        return $this->url;
    }

    /**
     * get the server adress
     *
     * @return string
     */
    public function getServerAdress()
    {
        return $this->serverAdress;
    }

    /**
     * get a new SOAP client
     *
     * @see https://avm.de/service/schnittstellen
     *
     * @param string $name of service
     * @return void
     */
    public function getClient(string $name)
    {
        $parameter = $this->services->xpath("//services[@name='$name']");
        $location = (string)$parameter[0]->location;
        $service = (string)$parameter[0]->service;
        $this->client = new \SoapClient(
            null, [
                'location'   => $this->serverAdress . $location,
                'uri'        => $service,
                'noroot'     => true,
                'login'      => $this->user,
                'password'   => $this->password,
                'trace'      => true,
                'exceptions' => false
            ]);
    }

    /**
     * get SOAP error data
     * disassemble the soapfault object to get more detailed
     * error information into $this->errorCode and $this->errorText
     *
     * @param object $result
     * @return void
     */
    private function getErrorData($result)
    {
        $this->errorCode = isset($result->detail->UPnPError->errorCode) ? $result->detail->UPnPError->errorCode : $result->faultcode;
        $this->errorText = isset($result->detail->UPnPError->errorDescription) ? $result->detail->UPnPError->errorDescription : $result->faultstring;
    }

    /**
     * get info of service
     *
     * please note:
     * currently only the x_tam service has an input parameter ('NewIndex')
     * to call this function for this particular service
     * the value of $inParam has to be ['NewIndex' => 0] or ['NewIndex' => 1]
     * depending on which answering machine you want the information from
     *
     * @param array $inParam
     * @return array $result
     */
    public function getInfo(array $inParam = [])
    {
        reset($inParam);             // set ponter to first element -> 7.3: array_key_first()
        $param = key($inParam);
        $value = $inParam[$param];
        $result = $this->client->GetInfo(new \SoapParam($value, $param));

        return $result;
    }

    /**
     * get a list of phonebooks implemented on the FRITZ!Box
     * requires a client of 'x_contact'
     *
     * @return array|void list of phonebook indices like '0,1,2,3' or
     *                     402 (Invalid arguments Any)
     *                     820 (Internal Error)
     */
    public function getPhonebookList()
    {
        $result = $this->client->GetPhonebookList();
        if (is_soap_fault($result)) {
            $errorData = $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not access to phonebooks on FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }
        return $result;
    }

    /**
     * delivers the content of a designated phonebook
     * requires a client of 'x_contact'
     *
     * The following URL parameters are also supported but not coded yet:
     * Parameter name    Type          Remarks
     * ---------------------------------------------------------------------------------------
     * pbid              number        Phonebook ID
     * max               number        maximum number of entries in call list, default 999
     * sid               hex-string    Session ID for authentication
     * timestamp         number        value from timestamp tag, to get the phonebook content
     *                                 only if last modification was made after this timestamp
     * tr064sid          string        Session ID for authentication (obsolete)
     *
     * @param int $phoneBookID
     * @return SimpleXMLElement|void  phonebook or
     *                                402 (Invalid arguments)
     *                                713 (Invalid array index)
     *                                820 (Internal Error)
     */
    public function getPhonebook(int $phoneBookID = 0)
    {
        $result = $this->client->GetPhonebook(new \SoapParam($phoneBookID, 'NewPhonebookID'));
        if (is_soap_fault($result)) {
            $errorData = $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not get the phonebook %s", $this->errorCode, $this->errorText, $phoneBookID));
            return;
        }
        $phonebook = simplexml_load_file($result['NewPhonebookURL']);
        $phonebook->asXML();

        return $phonebook;
    }

    /**
     * add a new entry in the designated phonebook
     * requires a client of 'x_contact'
     *
     * @param string $name
     * @param int $phoneBookID
     * @return void|string null or
     *                     402 (Invalid arguments)
     *                     820 (Internal Error)
     */
    public function addPhonebook(string $name, int $phoneBookID = null)
    {
        $result = $this->client->AddPhonebook(
                    new \SoapParam($name, 'NewPhonebookName'),
                    new \SoapParam($phoneBookID, 'NewPhonebookExtraID'));
        if (is_soap_fault($result)) {
            $errorData = $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not add the new phonebook %s", $this->errorCode, $this->errorText, $name));
            return;
        }

        return $result;
    }

    /**
     * deletes a designated phonebook
     * requires a client of 'x_contact'
     *
     * @param int $phoneBookID
     * @return string|void null or
     *                     402 (Invalid arguments)
     *                     713 (Invalid array index)
     *                     820 (Internal Error)
     */
    public function deletePhonebook($phoneBookID)
    {
        $result = $this->client->DeletePhonebook(new \SoapParam($phoneBookID, 'NewPhonebookID'));
        if (is_soap_fault($result)) {
            $errorData = $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not delete the phonebook with index %s", $this->errorCode, $this->errorText, $phoneBookID));
            return;
        }

        return $result;
    }

    /**
     * add an new entry in the designated phonebook
     * requires a client of 'x_contact'
     *
     * @param SimpleXMLElement $entry
     * @param int $phoneBookID
     * @return string|void null or
     *                     402 (Invalid arguments)
     *                     600 (Argument invalid)
     *                     713 (Invalid array index)
     *                     820 (Internal Error)
     */
    public function setPhonebookEntry(SimpleXMLElement $entry, $phoneBookID = 0)
    {
        $result = $this->client->SetPhonebookEntry(
                    new \SoapParam($phoneBookID, 'NewPhonebookID'),
                    new \SoapParam($entry, 'NewPhonebookEntryData'),
                    new \SoapParam(null, 'NewPhonebookEntryID'));
        if (is_soap_fault($result)) {
            $errorData = $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not add the new entry to the phonebook with index %s", $this->errorCode, $this->errorText, $phoneBookID));
            return;
        }

        return $result;
    }

    /**
     * get a xml contact structure for AVMs TR-064 interface
     * example minimal structur:
     * <?xml version="1.0"?>
     * <Envelope xmlns:s="http://www.w3.org/2003/05/soap-envelope">
     *     <contact>
     *         <person>
     *             <realName>$caller</realName>
     *         </person>
     *         <telephony>
     *             <number id="0" type=$type>$number</number>
     *         </telephony>
     *     </contact>
     * </Envelope>
     *
     * @param string $name
     * @param string $number
     * @param string $type phone type (home, work, mobile, fax_work)
     * @return SimpleXMLElement SOAP envelope
     */
    public function newContact($name, $number, $type) : SimpleXMLElement
    {
        $envelope = new simpleXMLElement('<Envelope xmlns:s="http://www.w3.org/2003/05/soap-envelope"></Envelope>');

        $contact = $envelope->addChild('contact');
        $contact->addChild('carddav_uid');
        $contact->addChild('category', '0');

        $person = $contact->addChild('person');
        $person->addChild('realName', $name);

        $telephony = $contact->addChild('telephony');
        $telephony->addAttribute('nid', '1');

        $phone = $telephony->addChild('number', $number);
        $phone->addAttribute('type', $type);
        $phone->addAttribute('prio', '0');
        $phone->addAttribute('id', '0');

        $contact->addChild('services');
        $contact->addChild('setup');

        $features = $contact->addChild('features');
        $features->addAttribute('doorphone', '0');

        $contact->addChild('mod_time', (string)time());
        $contact->addChild('uniqueid');

        return $envelope;
    }

    /**
     * dial a number
     * requires a client of 'x_voip'
     * precondition: you must activate "Wählhilfe" in your FRITZ!Box:
     * Telefonie -> Telefonbuch -> Wählhilfe -> Wählhilfe verwenden
     *
     * @param string $number
     * @return void
     */
    public function dialNumber($number)
    {
        $result = $this->client->{'X_AVM-DE_DialNumber'}(new \SoapParam($number, 'NewX_AVM-DE_PhoneNumber'));
        if (is_soap_fault($result)) {
            $errorData = $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not dial the number %s", $this->errorCode, $this->errorText, $number));
        }
    }

    /**
     * Disconnect the dialling process
     * requires a client of 'x_voip'
     * precondition: you must activate "Wählhilfe" in your FRITZ!Box:
     * Telefonie -> Telefonbuch -> Wählhilfe -> Wählhilfe verwenden
     *
     * @return void
     */
    public function hangUp()
    {
        $result = $this->client->{'X_AVM-DE_DialHangup'}();
        if (is_soap_fault($result)) {
            $errorData = $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not hang up", $this->errorCode, $this->errorText));
        }
    }

    /**
     * get a XML list of connected devices to the network
     * requires a client of 'hosts'
     *
     * @return SimpleXMLElement
     */
    public function getMeshListPath()
    {
        $result = $this->client->{'X_AVM-DE_GetMeshListPath'}();
        $meshListArray = json_decode(file_get_contents($this->serverAdress . $result), true);
        $xml = new SimpleXMLElement('<?xml version="1.0"?><data></data>');

        return $this->arrayToXML($meshListArray, $xml);
    }

    /**
     * get a XML list of ...
     *
     * @return SimpleXMLElement
     */
    public function getFileLinkListPath()
    {
        $result = $this->client->GetFilelinkListPath();
        return file_get_contents($this->serverAdress . $result);
    }

    /**
     * converting an array to XML
     * top voted answer to https://stackoverflow.com/questions/1397036/how-to-convert-array-to-simplexml
     *
     * @param array $data
     * @param SimpleXMLElement $xmlData
     * @return SimpleXMLElement $xmlData
     */
    private function arrayToXML($data, &$xmlData)
    {
        foreach ($data as $key => $value) {
            if (is_numeric($key)) {
                $key = 'item'.$key;                     //dealing with <0/>..<n/> issues
            }
            if (is_array($value)) {
                $subnode = $xmlData->addChild($key);
                $this->arrayToXML($value, $subnode);
            } else {
                $xmlData->addChild((string)$key, htmlspecialchars((string)$value));
            }
        }

        return $xmlData;
    }
}
