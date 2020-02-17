<?php

namespace blacksenator\fritzsoap;

/**
* The class provides functions to read and manipulate
* data via TR-064 interface on FRITZ!Box router from AVM:
* according to:
* @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/x_contactSCPD.pdf
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
* +++++++++++++++++++++ ATTENTION +++++++++++++++++++++
* THIS FILE IS AUTOMATIC ASSEMBLED BUT PARTLY REVIEWED!
* ALL FUNCTIONS ARE FRAMEWORKS AND HAVE TO BE CORRECTLY
* CODED, IF THEIR COMMENT WAS NOT OVERWRITTEN!
* +++++++++++++++++++++++++++++++++++++++++++++++++++++
*
* @author Volker Püschel <knuffy@anasco.de>
* @copyright Volker Püschel 2020
* @license MIT
**/

use blacksenator\fritzsoap\fritzsoap;
use \SimpleXMLElement;

class x_contact extends fritzsoap
{
    /**
     * getInfo
     *
     * out: NewEnable
     * out: NewStatus
     * out: NewLastConnect
     * out: NewUrl
     * out: NewServiceId
     * out: NewUsername
     * out: NewName
     *
     * @return array
     */
    public function getInfo()
    {
        $result = $this->client->GetInfo();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not get info from FRITZ!Box", $this->errorCode, $this->errorText));
            return [];
        }

        return $result;
    }

    /**
     * setEnable
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewEnable
     *
     */
    public function setEnable()
    {
        $result = $this->client->SetEnable();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * setConfig
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewEnable
     * in: NewUrl
     * in: NewServiceId
     * in: NewUsername
     * in: NewPassword
     * in: NewName
     *
     */
    public function setConfig()
    {
        $result = $this->client->SetConfig();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * getInfoByIndex
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewIndex
     * out: NewEnable
     * out: NewStatus
     * out: NewLastConnect
     * out: NewUrl
     * out: NewServiceId
     * out: NewUsername
     * out: NewName
     *
     */
    public function getInfoByIndex()
    {
        $result = $this->client->GetInfoByIndex();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * setEnableByIndex
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewIndex
     * in: NewEnable
     *
     */
    public function setEnableByIndex()
    {
        $result = $this->client->SetEnableByIndex();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * setConfigByIndex
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewIndex
     * in: NewEnable
     * in: NewUrl
     * in: NewServiceId
     * in: NewUsername
     * in: NewPassword
     * in: NewName
     *
     */
    public function setConfigByIndex()
    {
        $result = $this->client->SetConfigByIndex();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * deleteByIndex
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewIndex
     *
     */
    public function deleteByIndex()
    {
        $result = $this->client->DeleteByIndex();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * getNumberOfEntries
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewOnTelNumberOfEntries
     *
     */
    public function getNumberOfEntries()
    {
        $result = $this->client->GetNumberOfEntries();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * getCallList
     *
     * out: NewCallListURL
     *
     * @return string|void;
     */
    public function getCallList()
    {
        $result = $this->client->GetCallList();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not receive the call list from FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }
        $callList = file_get_contents($result);

        return $callList;
    }

    /**
     * getPhonebookList
     * get a list of phonebooks implemented on the FRITZ!Box
     *
     * out: NewPhonebookList
     *
     * @return array|void list of phonebook indices like '0,1,2,3' or
     *                     402 (Invalid arguments Any)
     *                     820 (Internal Error)
     */
    public function getPhonebookList()
    {
        $result = $this->client->GetPhonebookList();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * getPhonebook
     *
     * in: NewPhonebookID
     * out: NewPhonebookName
     * out: NewPhonebookExtraID
     * out: NewPhonebookURL
     *
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
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not get the phonebook %s", $this->errorCode, $this->errorText, $phoneBookID));
            return;
        }
        $phonebook = simplexml_load_file($result['NewPhonebookURL']);
        $phonebook->asXML();

        return $phonebook;
    }

    /**
     * addPhonebook
     *
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
            new \SoapParam($phoneBookID, 'NewPhonebookExtraID')
        );
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not add the new phonebook %s", $this->errorCode, $this->errorText, $name));
            return;
        }

        return $result;
    }

    /**
     * deletePhonebook
     *
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
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not delete the phonebook with index %s", $this->errorCode, $this->errorText, $phoneBookID));
            return;
        }

        return $result;
    }

    /**
     * getPhonebookEntry
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewPhonebookID
     * in: NewPhonebookEntryID
     * out: NewPhonebookEntryData
     *
     */
    public function getPhonebookEntry()
    {
        $result = $this->client->GetPhonebookEntry();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * getPhonebookEntryUID
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewPhonebookID
     * in: NewPhonebookEntryUniqueID
     * out: NewPhonebookEntryData
     *
     */
    public function getPhonebookEntryUID()
    {
        $result = $this->client->GetPhonebookEntryUID();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * setPhonebookEntry
     *
     * add an new entry in the designated phonebook
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
            new \SoapParam(null, 'NewPhonebookEntryID')
        );
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
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
     * setPhonebookEntryUID
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewPhonebookID
     * in: NewPhonebookEntryData
     * out: NewPhonebookEntryUniqueID
     *
     */
    public function setPhonebookEntryUID()
    {
        $result = $this->client->SetPhonebookEntryUID();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * deletePhonebookEntry
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewPhonebookID
     * in: NewPhonebookEntryID
     *
     */
    public function deletePhonebookEntry()
    {
        $result = $this->client->DeletePhonebookEntry();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * deletePhonebookEntryUID
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewPhonebookID
     * in: NewPhonebookEntryUniqueID
     *
     */
    public function deletePhonebookEntryUID()
    {
        $result = $this->client->DeletePhonebookEntryUID();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * getCallBarringEntry
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewPhonebookEntryID
     * out: NewPhonebookEntryData
     *
     */
    public function getCallBarringEntry()
    {
        $result = $this->client->GetCallBarringEntry();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * getCallBarringEntryByNum
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewNumber
     * out: NewPhonebookEntryData
     *
     */
    public function getCallBarringEntryByNum()
    {
        $result = $this->client->GetCallBarringEntryByNum();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * getCallBarringList
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewPhonebookURL
     *
     */
    public function getCallBarringList()
    {
        $result = $this->client->GetCallBarringList();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * setCallBarringEntry
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewPhonebookEntryData
     * out: NewPhonebookEntryUniqueID
     *
     */
    public function setCallBarringEntry()
    {
        $result = $this->client->SetCallBarringEntry();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * deleteCallBarringEntryUID
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewPhonebookEntryUniqueID
     *
     */
    public function deleteCallBarringEntryUID()
    {
        $result = $this->client->DeleteCallBarringEntryUID();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * getDECTHandsetList
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewDectIDList
     *
     */
    public function getDECTHandsetList()
    {
        $result = $this->client->GetDECTHandsetList();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * getDECTHandsetInfo
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewDectID
     * out: NewHandsetName
     * out: NewPhonebookID
     *
     */
    public function getDECTHandsetInfo()
    {
        $result = $this->client->GetDECTHandsetInfo();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * setDECTHandsetPhonebook
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewDectID
     * in: NewPhonebookID
     *
     */
    public function setDECTHandsetPhonebook()
    {
        $result = $this->client->SetDECTHandsetPhonebook();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * getNumberOfDeflections
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewNumberOfDeflections
     *
     */
    public function getNumberOfDeflections()
    {
        $result = $this->client->GetNumberOfDeflections();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * getDeflection
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewDeflectionId
     * out: NewEnable
     * out: NewType
     * out: NewNumber
     * out: NewDeflectionToNumber
     * out: NewMode
     * out: NewOutgoing
     * out: NewPhonebookID
     *
     */
    public function getDeflection()
    {
        $result = $this->client->GetDeflection();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * getDeflections
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewDeflectionList
     *
     */
    public function getDeflections()
    {
        $result = $this->client->GetDeflections();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * setDeflectionEnable
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewDeflectionId
     * in: NewEnable
     *
     */
    public function setDeflectionEnable()
    {
        $result = $this->client->SetDeflectionEnable();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

}
