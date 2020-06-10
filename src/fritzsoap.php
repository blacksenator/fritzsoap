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
  * @copyright Volker Püschel 2020
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

    private $services;
    private $url = [];
    private $user;
    private $password;
    public $serverAdress;
    public $client = null;
    public $errorCode;
    public $errorText;

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
            throw new \Exception ('Could not assemble valid server address!');
        }
        $this->services = $this->getFritzBoxServices();
        if ($this->services === false) {
            throw new \Exception ('SOAP services could not be determined!');
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
     *             <action>...</action>
     *          </actions>
     *      </services>
     *      ...
     *  </tr064>
     *
     * @return SimpleXMLElement|bool
     */
    private function getFritzBoxServices()
    {
        $tr064 = new SimpleXMLElement('<tr064 />');
        foreach (self::SERVICE_DESCRIPTIONS as $description) {
            $serviceHeaders = $this->getDescriptionXML($this->serverAdress . '/' . $description, 'service');
            foreach ($serviceHeaders as $serviceHeader) {
                $services = $tr064->addChild('services');
                $name = explode('/', $serviceHeader->controlURL);
                $services->addAttribute('name', $name[3]);
                $services->addChild('service', (string)$serviceHeader->serviceType);
                $services->addChild('location', (string)$serviceHeader->controlURL);
                $actionsDesc = $this->getDescriptionXML($this->serverAdress . $serviceHeader->SCPDURL, 'action');
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
        $result = $tr064->xpath('//services');
        if (!count($result)) {
            return false;
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
     * @return SimpleXMLElement
     */
    public function getServiceDescription(): SimpleXMLElement
    {
        return $this->services;
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
        $class = get_class($this);
        $className = str_replace('blacksenator\\fritzsoap\\', '', $class);
        $parameter = $this->services->xpath("//services[@name='$className']");
        if (!count($parameter)) {
            $message = sprintf('No service parameters for %s available!', $className);
            throw new \Exception ($message);
        }
        $location = (string)$parameter[0]->location;
        $service = (string)$parameter[0]->service;
        $this->client = new \SoapClient(null, [
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
    public function getErrorData($result)
    {
        $this->errorCode = isset($result->detail->UPnPError->errorCode) ? $result->detail->UPnPError->errorCode : $result->faultcode;
        $this->errorText = isset($result->detail->UPnPError->errorDescription) ? $result->detail->UPnPError->errorDescription : $result->faultstring;
    }

    /**
     * converting an array to XML
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
