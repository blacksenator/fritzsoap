<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides the central base functions to read and manipulate data via
 * SOAP interface on FRITZ!Box router or repeater from AVM
 *
 * @see https://boxmatrix.info/wiki/XML-Files ('*desc.xml (static)') as an
 * overview of service description files (self::SERVICE_DESCR)
 *
 * @author Volker Püschel <knuffy@anasco.de>
 * @copyright Volker Püschel 2019 - 2025
 * @license MIT
**/

use \SimpleXMLElement;

class fritzsoap
{
    use AdressTrait;

    const
        SERVICE_DESCR = [
            'aura.xml',
            'avmnexusdesc.xml',
            'fboxdesc.xml',
            'GPMDevDesc.xml',                   // not available on my system
            'igddesc.xml',
            'igd2desc.xml',
            'l2tpv3.xml',
            'MediaRendererDevDesc.xml',         // not available on my system
            'MediaServerDevDesc.xml',           // not available on my system
            'MediaServerDevDesc-xbox.xml',      // not available on my system
            'onlinestoredesc.xml',              // not available on my system
            'satipdesc.xml',
            'TMediaCenterDevDesc.xml',
            'tr64desc.xml',                     // main description file
            'usbdesc.xml',                      // not available on my system
        ],
        SOAP_EXCEPTIONS = false,
        SOAP_NOROOT     = true,
        SOAP_TRACE      = true;

    private
        $url = [],
        $user,
        $password;
    protected
        $fritzBoxURL,
        $serviceType,
        $controlURL,
        $client = null,
        $errorCode,
        $errorText;

    /**
     * instantiation
     * credentials are optional for IDG services (WAN*)
     *
     * @param string $url
     * @param string $user
     * @param string $password
     * @return void
     */
    public function __construct($url = null, $user = null, $password = null)
    {
        $this->setResourceAdresses($url);
        $this->user = $user;
        $this->password = $password;
        $class = $this->getClassName()['class'];
        $this->serviceType = $class::SERVICE_TYPE;
        $this->controlURL = $class::CONTROL_URL;
        $this->getClient();
    }

    /**
     * get a new SOAP client
     *
     * AVM Documentation about SID:
     * "Once it has been assigned, a session ID is valid for 20 minutes. The
     * validity is extended automatically whenever access to the FRITZ!Box is
     * active.
     * ...
     * A session can be ended at any time by deleting the session ID, even
     * before the automatic 10-minute timeout kicks in."
     *
     * You must therefore keep in mind that if programs have been running for a
     * longer time, the SID may need to be renewed by calling this function
     *
     * @see https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/AVM_Technical_Note_-_Session_ID_english_2021-05-03.pdf
     *
     * @return void
     */
    public function getClient()
    {
        $this->client = new \SoapClient(null, [
            'location'   => $this->fritzBoxURL . $this->controlURL,
            'uri'        => $this->serviceType,
            'login'      => $this->user,
            'password'   => $this->password,
            'exceptions' => self::SOAP_EXCEPTIONS,
            'noroot'     => self::SOAP_NOROOT,
            'trace'      => self::SOAP_TRACE,
        ]);
    }

    /**
     * get the determined services
     *
     * returns the identified services use $detailed = true if more details are
     * required (time consuming!)
     *
     * @param bool $detailed
     * @return SimpleXMLElement
     */
    public function getServiceDescription($detailed = false): SimpleXMLElement
    {
        return $this->getFritzBoxServices($detailed);
    }

    /**
     * return all available services (in ascending order by name)
     * and their actions from the FRITZ!Box in a condenzed XML:
     *
     *  <?xml version="1.0"?>
     *  <fritzsoap>
     *      <services name="x_contact">
     *         <service>urn:dslforum-org:service:X_AVM-DE_OnTel:1</service>
     *         <location>/upnp/control/x_contact</location>
     *         <actions>
     *             <action>GetInfo</action>
     *                 ... (optional if $detailed = true)
     *             <action>...</action>
     *          </actions>
     *      </services>
     *      ...
     *  </fritzsoap>
     *
     * or false if no services are identified
     *
     * @param bool $detailed
     * @return SimpleXMLElement|bool
     */
    protected function getFritzBoxServices($detailed = false)
    {
        if ($services = $this->getServices($detailed)) {
            usort($services, [$this, 'sortServices']);  // using callback function $this->sortServices
            $fritzsoap = new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><fritzsoap />');
            foreach ($services as $service) {
                $this->adoptXMLNode($fritzsoap, $service);
            }

            return $fritzsoap;
        }

        return false;
    }

    /**
     * return the corresponding string to boolean value
     *
     * @param bool $state
     * @return string
     */
    public function boolToState(bool $state)
    {
        return $state ? "enable" : "disable";
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
        $msg = $message ?? 'Could not ... from/to FRITZ!Box';   // we do not better know ...

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
     * currently only used in hosts.php and possibly in the future in other
     * classes
     *
     * @see https://stackoverflow.com/questions/1397036/how-to-convert-array-to-simplexml
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

    /**
     * return service data from description files
     *
     * @param bool $detailed
     * @param array of SimpleXMLElement $services
     */
    private function getServices($detailed)
    {
        $services = [];
        $stateTable = [];
        foreach (self::SERVICE_DESCR as $description) {
            $serviceHeaders = $this->getDescriptionXML($this->fritzBoxURL . '/' . $description, 'service');
            foreach ($serviceHeaders as $serviceHeader) {
                $service = new SimpleXMLElement('<service />');
                $name = explode('/', $serviceHeader->controlURL);
                $service->addAttribute('name', $name[3]);
                $service->addAttribute('origin', $description);
                $service->addChild('serviceType', (string)$serviceHeader->serviceType);
                $service->addChild('controlURL', (string)$serviceHeader->controlURL);
                $actionsDesc = $this->getDescriptionXML($this->fritzBoxURL . $serviceHeader->SCPDURL, 'action');
                if ($detailed) {
                    $stateVariables = $this->getDescriptionXML($this->fritzBoxURL . $serviceHeader->SCPDURL, 'stateVariable');
                    $stateTable = $this->getStateTable($stateVariables);
                }
                $actions = $service->addChild('actions');
                foreach ($actionsDesc as $actionDesc) {
                    if (!$detailed) {
                        $action = $actions->addChild('action', (string)$actionDesc->name);
                    } else {
                        $action = $actions->addChild('action');
                        $action->addAttribute('name', (string)$actionDesc->name);
                        $action->addAttribute('origin', substr($serviceHeader->SCPDURL, 1));
                        if (!property_exists($actionDesc, 'argumentList')) {
                            continue;
                        }
                        foreach ($actionDesc->argumentList->argument as $attribute) {
                            $argument = $action->addChild('argument', (string)$attribute->name);
                            $argument->addAttribute('direction', (string)$attribute->direction);
                            $argument->addAttribute('relatedStateVariable', (string)$attribute->relatedStateVariable);
                            $argument->addAttribute('dataType', $stateTable[(string)$attribute->relatedStateVariable]);
                        }
                    }
                }
            $services[] = $service;
            }
        }
        if (!count($services)) {
            return false;
        }

        return $services;
    }

    /**
     * sorting services by name
     *
     * @param string $t1
     * @param string $t2
     * @return int
     */
    private function sortServices($t1, $t2)
    {
        return strcasecmp($t1['name'], $t2['name']);
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
        if ($fileHeaders !== false && !strpos($fileHeaders[0], '404')) {
            $xml = @simplexml_load_file($xmlFile);
            if ($xml !== false) {
                $xml->registerXPathNamespace('fb', $xml->getNameSpaces(false)[""]);
                $result = $xml->xpath("//fb:$node");
            }
        }

        return $result;
    }

    /**
     * get the state table of the service(s) from XML
     *
     * @param array of SimpleXMLElement $stateVariables
     * @return array
     */
    private function getStateTable($stateVariables)
    {
        $result = [];
        foreach ($stateVariables as $stateVariable) {
            $result[(string)$stateVariable->name] = (string)$stateVariable->dataType;
        }

        return $result;
    }

    /**
     * get the class name
     *
     * @return array
     */
    private function getClassName()
    {
        $class = get_class($this);
        $className = str_replace('blacksenator\\fritzsoap\\', '', $class);

        return [
            'class'     => $class,                              // object
            'className' => $className                           // string
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
    private function getErrorData($result)
    {
        $this->errorCode = $result->detail->UPnPError->errorCode ?? $result->faultcode;
        $this->errorText = $result->detail->UPnPError->errorDescription ?? $result->faultstring;
    }

    /**
     * Attach xml element to parent
     *
     * @see https://stackoverflow.com/questions/4778865/php-simplexml-addchild-with-another-simplexmlelement
     *
     * @param SimpleXMLElement $to
     * @param SimpleXMLElement $from
     * @return void
     */
    private function adoptXMLNode(SimpleXMLElement $to, SimpleXMLElement $from)
    {
        $toDom = dom_import_simplexml($to);
        $fromDom = dom_import_simplexml($from);
        $toDom->appendChild($toDom->ownerDocument->importNode($fromDom, true));
    }
}
