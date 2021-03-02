<?php

namespace blacksenator\fritzsoap;

/**
  * The class provides the base functions to read and
  * manipulate data via TR-064 interface on FRITZ!Box
  * router from AVM:
  *
  * With the instantiation of this class or descendants,
  * all available services of the addressed FRITZ!Box
  * are determined automatically.
  * The service parameters and available actions are
  * provided in a compressed form as XML and can be output
  * with getServiceDescription().
  * The matching SOAP client only needs to be called with
  * the name of the services <services name = "..."> as
  * class name and gets the correct location and uri from
  * the XML (see getFritzBoxServices() for details)
  *
  * Example (get your avalaible services)
  *   $fritzbox = new x_contact($url, $user, $password);
  *   $services = $fritzbox->getServiceDescription();
  *   $services->asXML('services.xml');
  *
  * Example (get info of a service):
  *   $fritzbox = new x_voip($url, $user, $password);
  *   $fritzbox->getClient();
  *   $info = $fritzbox->getInfo()
  *
  * Example (get list of network devices)
  *   $fritzbox = new hosts($url, $user, $password);
  *   $fritzbox->getClient();
  *   $meshList = $fritzbox->x_AVM_DE_GetMeshListPath();
  *
  * @author Volker Püschel <knuffy@anasco.de>
  * @copyright Volker Püschel 2021
  * @license MIT
 **/

use \SimpleXMLElement;
use blacksenator\fbvalidateurl\fbvalidateurl;

class fritzsoap
{
    const SERVICE_DESCRIPTIONS = [          // see: https://boxmatrix.info/wiki/XML-Files ('*desc.xml (static)')
        'aura.xml',                         // found on my 7490 OS7.12, but not on 7590 OS7.21
        'tr64desc.xml',                     // found on my 7490 OS7.12
        'igddesc.xml',                      // found on my 7490 OS7.12
        'avmnexusdesc.xml',                 // found on my 7490 OS7.12
        'GPMDevDesc.xml',
        'igd2desc.xml',                     // found on my 7490 OS7.12
        'l2tpv3.xml',                       // found on my 7490 OS7.12
        'MediaRendererDevDesc.xml',
        'MediaServerDevDesc.xml',           // found on my 7490 OS7.12
        'MediaServerDevDesc-xbox.xml',      // found on my 7490 OS7.12
        'onlinestoredesc.xml',
        'satipdesc.xml',
        'TMediaCenterDevDesc.xml',
        'usbdesc.xml',
        ];

    const
        FB_ADRESS       = 'fritz.box',
        SOAP_NOROOT     = true,
        SOAP_TRACE      = true,
        SOAP_EXCEPTIONS = false,
        CLASS_ANOMALY   = ['Control'];      // there are similar services Control1 to Control7

    private $url = [];
    private $user;
    private $password;
    private $serverAdress;
    protected $services = null;
    protected $client = null;
    protected $errorCode;
    protected $errorText;

    /**
     * instantiation
     * credentials are optional for IGD services?
     *
     * @param string $url
     * @param string $user
     * @param string $password
     * @param SimpleXMLElement $services
     * @return void
     */
    public function __construct($url, $user, $password, $services = null)
    {
        $validator = new fbvalidateurl;
        $this->url = $validator->getValidURL($url);
        $this->assembleServerAdress($this->url);
        $this->user = $user;
        $this->password = $password;
        $this->services = $services ?: $this->getFritzBoxServices();      // if possible only read once
        if ($this->services === false) {
            throw new \Exception ('SOAP services could not be determined!');
        }
    }

    /**
     * assemblethe correct server address, depending on
     * whether it is encrypted or not
     *
     * @param array $url
     * @return void
     */
    private function assembleServerAdress(array $url)
    {
        if ($url['scheme'] == 'http') {
            $this->serverAdress = 'http://' . $url['host'] . ':49000';
        } elseif ($this->url['scheme'] == 'https') {
            $this->serverAdress = 'https://' . $url['host'] . ':49443';
        } else {
            throw new \Exception ('Could not assemble valid server address!');
        }
    }

    /**
     * get all available services and their actions from the FRITZ!Box
     * in a condenzed XML:
     *
     *  <?xml version="1.0"?>
     *  <tr064>
     *      <services name = "x_contact">
     *         <service>urn:dslforum-org:service:X_AVM-DE_OnTel:1</service>
     *         <location>/upnp/control/x_contact</location>
     *         <actions>
     *             <action>GetInfo</action>
     *                 ... (optional if $detailed = true)
     *             <action>...</action>
     *          </actions>
     *      </services>
     *      ...
     *  </tr064>
     *
     * @param bool $detailed
     * @return SimpleXMLElement|bool
     */
    protected function getFritzBoxServices($detailed = false)
    {
        $tr064 = new SimpleXMLElement('<tr064 />');
        foreach (self::SERVICE_DESCRIPTIONS as $description) {
            $serviceHeaders = $this->getDescriptionXML($this->serverAdress . '/' . $description, 'service');
            foreach ($serviceHeaders as $serviceHeader) {
                $services = $tr064->addChild('services');
                $name = explode('/', $serviceHeader->controlURL);
                $services->addAttribute('name', $name[3]);
                $services->addAttribute('origin', $description); //
                $services->addChild('service', (string)$serviceHeader->serviceType);
                $services->addChild('location', (string)$serviceHeader->controlURL);
                $actionsDesc = $this->getDescriptionXML($this->serverAdress . $serviceHeader->SCPDURL, 'action');
                $actions = $services->addChild('actions');
                foreach ($actionsDesc as $actionDesc) {
                    if (!$detailed) {
                        $action = $actions->addChild('action', (string)$actionDesc->name);
                    } else {
                        $action = $actions->addChild('action');
                        $action->addAttribute('name', (string)$actionDesc->name);
                        $action->addAttribute('origin', substr($serviceHeader->SCPDURL, 1)); //
                        if (!property_exists($actionDesc, 'argumentList')) {
                            continue;
                        }
                        foreach ($actionDesc->argumentList->argument as $attribute) {
                            $argument = $action->addChild('argument', (string)$attribute->name);
                            $argument->addAttribute('direction', (string)$attribute->direction);
                            $argument->addAttribute('relatedStateVariable', (string)$attribute->relatedStateVariable);
                        }
                    }
                }
            }
        }
        $result = $tr064->xpath('//services');
        if (!count($result)) {
            return false;
        }

        return $tr064;
    }

    /**
     * get searched node from description XML
     *
     * the node is related to the kind of description file:
     * "*DESC.xml" = "service" defines the services and their related SCPD-file
     * "*SCPD.xml" = "action" defines the actions and their related variables
     *
     * @param string $xmlFile
     * @param string $node
     * @return array
     */
    private function getDescriptionXML(string $xmlFile, string $node): array
    {
        $result = [];
        $fileHeaders = @get_headers($xmlFile);
        if (!strpos($fileHeaders[0], '404') && $fileHeaders !== false) {
            $xml = @simplexml_load_file($xmlFile);
            if ($xml !== false) {
                $xml->registerXPathNamespace('fb', $xml->getNameSpaces(false)[""]);
                $result = $xml->xpath("//fb:$node");
            }
        }

        return $result;
    }

    /**
     * get the determined services
     *
     * returns the identified services or rereads
     * if more details are required (time consuming!)
     *
     * @param bool $detailed
     * @return SimpleXMLElement
     */
    public function getServiceDescription($detailed = false): SimpleXMLElement
    {
        return $detailed ? $this->getFritzBoxServices(true) : $this->services;
    }

    /**
     * get the validated URL parameters
     *
     * @return array
     */
    public function getURL(): array
    {
        return $this->url;
    }

    /**
     * get the server adress
     *
     * @return string
     */
    public function getServerAdress(): string
    {
        return $this->serverAdress;
    }

    /**
     * get a new SOAP client
     *
     * @see https://avm.de/service/schnittstellen
     *
     * @return void
     */
    public function getClient()
    {
        $parameters = $this->getSOAPParameters($this->getClassName());
        $this->client = new \SoapClient(null, [
            'location'   => $this->serverAdress . $parameters['location'],
            'uri'        => $parameters['service'],
            'noroot'     => self::SOAP_NOROOT,
            'login'      => $this->user,
            'password'   => $this->password,
            'trace'      => self::SOAP_TRACE,
            'exceptions' => self::SOAP_EXCEPTIONS,
            ]);
    }

    /**
     * get the class name
     *
     * @return string $className
     */
    private function getClassName()
    {
        $class = get_class($this);
        $className = str_replace('blacksenator\\fritzsoap\\', '', $class);
        if (in_array(substr($className, 0, -1), self::CLASS_ANOMALY)) {     // Control1, Control2, ...
            $message = sprintf('No service parameters for %s(%s) can be assigned!', $className, self::CLASS_ANOMALY);
            throw new \Exception ($message);
        }

        return $className;
    }

    /**
     * get the SOAP parameters of a service (eq. class)
     * - location
     * - service
     *
     * @param string $className
     * @return array $parameter
     */

    private function getSOAPParameters($className)
    {
        $param = $this->services->xpath("//services[@name='$className']");
        if (!count($param)) {
            $message = sprintf('No %s service parameters available on this FRITZ!Box!', $className);
            throw new \Exception ($message);
        }

        return [
            'location' => (string)$param[0]->location,
            'service'  => (string)$param[0]->service,
            ];
    }

    /**
     * get SOAP error data
     *
     * disassemble the soapfault object to get more detailed
     * error information into $this->errorCode and $this->errorText
     *
     * @param object $result
     * @return void
     */
    protected function getErrorData($result)
    {
        $this->errorCode = $result->detail->UPnPError->errorCode ?? $result->faultcode;
        $this->errorText = $result->detail->UPnPError->errorDescription ?? $result->faultstring;
    }

    /**
     * errorHandling
     *
     * returns true if an error had to be handled, otherwise false
     *
     * @param mixed $result
     * @param string $message
     * @return bool
     */
    protected function errorHandling($result, string $message = '')
    {
        $msg = $message ?? 'Could not ... from/to FRITZ!Box';           // we do not better know ...

        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! %s", $this->errorCode, $this->errorText, $msg));
            return true;
        }

        return false;
    }

    /**
     * converting an array to XML
     *
     * currently used in hosts.php and possibly in the future in other classes
     * @see top voted answer to https://stackoverflow.com/questions/1397036/how-to-convert-array-to-simplexml
     *
     * @param array $data
     * @param SimpleXMLElement $xmlData
     * @return SimpleXMLElement $xmlData
     */
    protected function arrayToXML($data, &$xmlData)
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
