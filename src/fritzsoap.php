<?php

namespace blacksenator\fritzsoap;

/**
  * The class provides functions to read and manipulate phonebook
  * related data via TR-064 interface on FRITZ!Box router from AVM.
  *
  * @author Volker Püschel <knuffy@anasco.de>
  * @copyright Volker Püschel 2019
  * @license MIT
 **/

use \SimpleXMLElement;

class fritzsoap
{
    private $ip;
    private $user;
    private $password;
    private $client = null;
    private $errorCode;
    private $errorText;

    public function __construct($ip, $user, $password)
    {
        $this->ip       = $ip;
        $this->user     = $user;
        $this->password = $password;
    }

    /**
     * get a new SOAP client
     *
     * @param string $location  TR-064 area (https://avm.de/service/schnittstellen/)
     * @param string $service   TR-064 service (https://avm.de/service/schnittstellen/)
     * @return void
     */
    public function getClient($location, $service)
    {
        if (!preg_match("/https/", $this->ip)) {
           $port = '49000';
        } else {
           $port = '49443';
        }
        $this->client = new \SoapClient(
                            null, [
                                'location'   => $this->ip.":".$port."/upnp/control/".$location,
                                'uri'        => "urn:dslforum-org:service:".$service,
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
     */
    private function getErrorData($result)
    {
        $this->errorCode = isset($result->detail->UPnPError->errorCode) ? $result->detail->UPnPError->errorCode : $result->faultcode;
        $this->errorText = isset($result->detail->UPnPError->errorDescription) ? $result->detail->UPnPError->errorDescription : $result->faultstring;
    }

    /**
     * get a list of phonebooks implemented on the FRITZ!Box
     * requires a client of location 'x_contact' and service 'X_AVM-DE_OnTel:1'
     *
     * @return string|void list of phonebook index like '0,1,2,3' or
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
     * requires a client of location 'x_contact' and service 'X_AVM-DE_OnTel:1'
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
    public function getPhonebook($phoneBookID = 0)
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
     * add an new entry in the designated phonebook
     * requires a client of location 'x_contact' and service 'X_AVM-DE_OnTel:1'
     *
     * @param string $name
     * @param integer $phoneBookID
     * @return void|string null or
     *                     402 (Invalid arguments)
     *                     820 (Internal Error)
     */
    public function addPhonebook($name, $phoneBookID = null)
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
     * requires a client of location 'x_contact' and service 'X_AVM-DE_OnTel:1'
     *
     * @param int $phoneBookID
     * @return string|void null or
     *                     402 (Invalid arguments)
     *                     713 (Invalid array index)
     *                     820 (Internal Error)
     */
    public function delPhonebook($phoneBookID)
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
     * requires a client of location 'x_contact' and service 'X_AVM-DE_OnTel:1'
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
     * get a minimal contact structure for AVMs TR-064 interface
     *
     * @param string $name
     * @param string $number
     * @param string $type phone type (home, work, mobile, fax_work)
     * @return SimpleXMLElement SOAP envelope:
     *                          <?xml version="1.0"?>
     *                          <Envelope xmlns:s="http://www.w3.org/2003/05/soap-envelope">
     *                              <contact>
     *                                  <person>
     *                                      <realName>$caller</realName>
     *                                  </person>
     *                                  <telephony>
     *                                      <number id="0" type=$type>$number</number>
     *                                  </telephony>
     *                              </contact>
     *                          </Envelope>
     */
    function newContact($name, $number, $type) : SimpleXMLElement
    {
        $envelope = new simpleXMLElement('<Envelope xmlns:s="http://www.w3.org/2003/05/soap-envelope"></Envelope>');

        $contact = $envelope->addChild('contact');

        $person = $contact->addChild('person');
        $person->addChild('realName', $name);

        $telephony = $contact->addChild('telephony');

        $phone = $telephony->addChild('number', $number);
        $phone->addAttribute('id', 0);
        $phone->addAttribute('type', $type);

        return $envelope;
    }
}
