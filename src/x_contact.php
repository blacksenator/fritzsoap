<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides functions to read and manipulate
 * data via TR-064 interface on FRITZ!Box router from AVM:
 *
 * @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/x_contactSCPD.pdf
 *
 * +++++++++++++++++++++ ATTENTION +++++++++++++++++++++
 * THIS FILE IS AUTOMATIC ASSEMBLED BUT PARTLY REVIEWED!
 * ALL FUNCTIONS ARE FRAMEWORKS AND HAVE TO BE CORRECTLY
 * CODED, IF THEIR COMMENT WAS NOT OVERWRITTEN!
 * +++++++++++++++++++++++++++++++++++++++++++++++++++++
 *
 * In addition to the designated functions for each action,
 * this class contains further functions:
 * - newContact() delivers a xml phonebook contact
 * - setContact() uses newcontact() and setphonebookEntry()
 *
 * @author Volker Püschel <knuffy@anasco.de>
 * @copyright Volker Püschel 2019 - 2021
 * @license MIT
**/

use blacksenator\fritzsoap\fritzsoap;
use \SimpleXMLElement;

class x_contact extends fritzsoap
{
    const
        SERVICE_TYPE = 'urn:dslforum-org:service:X_AVM-DE_OnTel:1',
        CONTROL_URL  = '/upnp/control/x_contact';

    /**
     * getInfo
     *
     * out: NewEnable (boolean)
     * out: NewStatus (string)
     * out: NewLastConnect (string)
     * out: NewUrl (string)
     * out: NewServiceId (string)
     * out: NewUsername (string)
     * out: NewName (string)
     *
     * @return array
     */
    public function getInfo()
    {
        $result = $this->client->GetInfo();
        if ($this->errorHandling($result, 'Could not get info from FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setEnable
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewEnable (boolean)
     *
     * @param bool $enable
     * @return void
     */
    public function setEnable($enable)
    {
        $result = $this->client->SetEnable(
            new \SoapParam($enable, 'NewEnable'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setConfig
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewEnable (boolean)
     * in: NewUrl (string)
     * in: NewServiceId (string)
     * in: NewUsername (string)
     * in: NewPassword (string)
     * in: NewName (string)
     *
     * @param bool $enable
     * @param string $url
     * @param string $serviceId
     * @param string $username
     * @param string $password
     * @param string $name
     * @return void
     */
    public function setConfig($enable, $url, $serviceId, $username, $password, $name)
    {
        $result = $this->client->SetConfig(
            new \SoapParam($enable, 'NewEnable'),
            new \SoapParam($url, 'NewUrl'),
            new \SoapParam($serviceId, 'NewServiceId'),
            new \SoapParam($username, 'NewUsername'),
            new \SoapParam($password, 'NewPassword'),
            new \SoapParam($name, 'NewName'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getInfoByIndex
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewIndex (ui2)
     * out: NewEnable (boolean)
     * out: NewStatus (string)
     * out: NewLastConnect (string)
     * out: NewUrl (string)
     * out: NewServiceId (string)
     * out: NewUsername (string)
     * out: NewName (string)
     *
     * @param int $index
     * @return array
     */
    public function getInfoByIndex($index)
    {
        $result = $this->client->GetInfoByIndex(
            new \SoapParam($index, 'NewIndex'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setEnableByIndex
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewIndex (ui2)
     * in: NewEnable (boolean)
     *
     * @param int $index
     * @param bool $enable
     * @return void
     */
    public function setEnableByIndex($index, $enable)
    {
        $result = $this->client->SetEnableByIndex(
            new \SoapParam($index, 'NewIndex'),
            new \SoapParam($enable, 'NewEnable'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setConfigByIndex
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewIndex (ui2)
     * in: NewEnable (boolean)
     * in: NewUrl (string)
     * in: NewServiceId (string)
     * in: NewUsername (string)
     * in: NewPassword (string)
     * in: NewName (string)
     *
     * @param int $index
     * @param bool $enable
     * @param string $url
     * @param string $serviceId
     * @param string $username
     * @param string $password
     * @param string $name
     * @return void
     */
    public function setConfigByIndex($index, $enable, $url, $serviceId, $username, $password, $name)
    {
        $result = $this->client->SetConfigByIndex(
            new \SoapParam($index, 'NewIndex'),
            new \SoapParam($enable, 'NewEnable'),
            new \SoapParam($url, 'NewUrl'),
            new \SoapParam($serviceId, 'NewServiceId'),
            new \SoapParam($username, 'NewUsername'),
            new \SoapParam($password, 'NewPassword'),
            new \SoapParam($name, 'NewName'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * deleteByIndex
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewIndex (ui2)
     *
     * @param int $index
     * @return void
     */
    public function deleteByIndex($index)
    {
        $result = $this->client->DeleteByIndex(
            new \SoapParam($index, 'NewIndex'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getNumberOfEntries
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewOnTelNumberOfEntries (ui2)
     *
     * @return int
     */
    public function getNumberOfEntries()
    {
        $result = $this->client->GetNumberOfEntries();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getCallList
     *
     * @return string
     */
    public function getCallList()
    {
        $result = $this->client->GetCallList();
        if ($this->errorHandling($result, 'Could not receive the call list from FRITZ!Box')) {
            return;
        }

        return file_get_contents($result);
    }

    /**
     * getPhonebookList
     *
     * get a list of phonebooks implemented on the FRITZ!Box
     *
     * out: NewPhonebookList
     *
     * @return string|void list of phonebook indices like '0,1,2,3' or
     *                     402 (Invalid arguments Any)
     *                     820 (Internal Error)
     * @return string
     */
    public function getPhonebookList()
    {
        $result = $this->client->GetPhonebookList();
        if ($this->errorHandling($result, 'Could not get list of phonebooks from FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getPhonebook
     *
     * returns the content of a phonebook as a
     * SimpleXMLElelment object
     *
     * in: NewPhonebookID (ui2)
     * out: NewPhonebookName (string)
     * out: NewPhonebookExtraID (string)
     * out: NewPhonebookURL (string)
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
     * @return SimpleXMLElement|bool $phonebook or
     *                               402 (Invalid arguments)
     *                               713 (Invalid array index)
     *                               820 (Internal Error)
     */
    public function getPhonebook($phonebookID = 0)
    {
        $result = $this->client->GetPhonebook(
            new \SoapParam($phonebookID, 'NewPhonebookID'));
        if ($this->errorHandling($result, sprintf("Could not get the phonebook %s", $phonebookID))) {
            return false;
        }

        return simplexml_load_file($result['NewPhonebookURL']);
    }

    /**
     * addPhonebook
     *
     * add a new entry in the designated phonebook
     *
     * in: NewPhonebookExtraID (string)
     * in: NewPhonebookName (string)
     *
     * @param string $phonebookExtraID
     * @param string $phonebookName
     * @return void|string null or
     *                     402 (Invalid arguments)
     *                     820 (Internal Error)
     */
    public function addPhonebook($phonebookName, $phonebookExtraID = null)
    {
        $result = $this->client->AddPhonebook(
            new \SoapParam($phonebookExtraID, 'NewPhonebookExtraID'),
            new \SoapParam($phonebookName, 'NewPhonebookName'));
        if ($this->errorHandling($result, sprintf("Could not add the new phonebook %s", $phonebookName))) {
            return;
        }

        return $result;
    }

    /**
     * deletePhonebook
     *
     * deletes a designated phonebook
     *
     * in: NewPhonebookID (ui2)
     * in: NewPhonebookExtraID (string)
     *
     * @param int $phonebookID
     * @param string $phonebookExtraID
     * @return string|void null or
     *                     402 (Invalid arguments)
     *                     713 (Invalid array index)
     *                     820 (Internal Error)
     */
    public function deletePhonebook($phonebookID)
    {
        $result = $this->client->DeletePhonebook(
            new \SoapParam($phonebookID, 'NewPhonebookID'),
        //  new \SoapParam($phonebookExtraID, 'NewPhonebookExtraID')
        );
        if ($this->errorHandling($result, sprintf("Could not delete the phonebook with index %s", $phonebookID))) {
            return;
        }

        return $result;
    }

    /**
     * getPhonebookEntry
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewPhonebookID (ui2)
     * in: NewPhonebookEntryID (ui4)
     * out: NewPhonebookEntryData (string)
     *
     * @param int $phonebookID
     * @param int $phonebookEntryID
     * @return string
     */
    public function getPhonebookEntry($phonebookID, $phonebookEntryID)
    {
        $result = $this->client->GetPhonebookEntry(
            new \SoapParam($phonebookID, 'NewPhonebookID'),
            new \SoapParam($phonebookEntryID, 'NewPhonebookEntryID'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getPhonebookEntryUID
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewPhonebookID (ui2)
     * in: NewPhonebookEntryUniqueID (ui4)
     * out: NewPhonebookEntryData (string)
     *
     * @param int $phonebookID
     * @param int $phonebookEntryUniqueID
     * @return string
     */
    public function getPhonebookEntryUID($phonebookID, $phonebookEntryUniqueID)
    {
        $result = $this->client->GetPhonebookEntryUID(
            new \SoapParam($phonebookID, 'NewPhonebookID'),
            new \SoapParam($phonebookEntryUniqueID, 'NewPhonebookEntryUniqueID'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setPhonebookEntry
     *
     * add an new entry in the designated phonebook
     *
     * in: NewPhonebookID (ui2)
     * in: NewPhonebookEntryID (ui4)
     * in: NewPhonebookEntryData (string)
     *
     * @param string $phonebookEntryData
     * @param int $phonebookID
     * @param int $phonebookEntryID  <uniqueid> if you want to overwrite an existing contact
     * @return void
     */
    public function setPhonebookEntry($phonebookEntryData, $phonebookID = 0, $phonebookEntryID = '')
    {
        $result = $this->client->SetPhonebookEntry(
            new \SoapParam($phonebookID, 'NewPhonebookID'),
            new \SoapParam($phonebookEntryID, 'NewPhonebookEntryID'),
            new \SoapParam($phonebookEntryData, 'NewPhonebookEntryData'));
        if ($this->errorHandling($result, sprintf("Could not add the new entry to the phonebook %s", $phonebookID))) {
            return;
        }

        return $result;
    }

    /**
     * setPhonebookEntryUID
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewPhonebookID (ui2)
     * in: NewPhonebookEntryData (string)
     * out: NewPhonebookEntryUniqueID (ui4)
     *
     * @param int $phonebookID
     * @param string $phonebookEntryData
     * @return int
     */
    public function setPhonebookEntryUID($phonebookID, $phonebookEntryData)
    {
        $result = $this->client->SetPhonebookEntryUID(
            new \SoapParam($phonebookID, 'NewPhonebookID'),
            new \SoapParam($phonebookEntryData, 'NewPhonebookEntryData'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * deletePhonebookEntry
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewPhonebookID (ui2)
     * in: NewPhonebookEntryID (ui4)
     *
     * @param int $phonebookID
     * @param int $phonebookEntryID
     * @return void
     */
    public function deletePhonebookEntry($phonebookID, $phonebookEntryID)
    {
        $result = $this->client->DeletePhonebookEntry(
            new \SoapParam($phonebookID, 'NewPhonebookID'),
            new \SoapParam($phonebookEntryID, 'NewPhonebookEntryID'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * deletePhonebookEntryUID
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewPhonebookID (ui2)
     * in: NewPhonebookEntryUniqueID (ui4)
     *
     * @param int $phonebookID
     * @param int $phonebookEntryUniqueID
     * @return void
     */
    public function deletePhonebookEntryUID($phonebookID, $phonebookEntryUniqueID)
    {
        $result = $this->client->DeletePhonebookEntryUID(
            new \SoapParam($phonebookID, 'NewPhonebookID'),
            new \SoapParam($phonebookEntryUniqueID, 'NewPhonebookEntryUniqueID'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getCallBarringEntry
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewPhonebookEntryID (ui4)
     * out: NewPhonebookEntryData (string)
     *
     * @param int $phonebookEntryID
     * @return string
     */
    public function getCallBarringEntry($phonebookEntryID)
    {
        $result = $this->client->GetCallBarringEntry(
            new \SoapParam($phonebookEntryID, 'NewPhonebookEntryID'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getCallBarringEntryByNum
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewNumber (string)
     * out: NewPhonebookEntryData (string)
     *
     * @param string $number
     * @return string
     */
    public function getCallBarringEntryByNum($number)
    {
        $result = $this->client->GetCallBarringEntryByNum(
            new \SoapParam($number, 'NewNumber'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getCallBarringList
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewPhonebookURL (string)
     *
     * @return string
     */
    public function getCallBarringList()
    {
        $result = $this->client->GetCallBarringList();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setCallBarringEntry
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewPhonebookEntryData (string)
     * out: NewPhonebookEntryUniqueID (ui4)
     *
     * @param string $phonebookEntryData
     * @return int
     */
    public function setCallBarringEntry($phonebookEntryData)
    {
        $result = $this->client->SetCallBarringEntry(
            new \SoapParam($phonebookEntryData, 'NewPhonebookEntryData'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * deleteCallBarringEntryUID
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewPhonebookEntryUniqueID (ui4)
     *
     * @param int $phonebookEntryUniqueID
     * @return void
     */
    public function deleteCallBarringEntryUID($phonebookEntryUniqueID)
    {
        $result = $this->client->DeleteCallBarringEntryUID(
            new \SoapParam($phonebookEntryUniqueID, 'NewPhonebookEntryUniqueID'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getDECTHandsetList
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewDectIDList (string)
     *
     * @return string
     */
    public function getDECTHandsetList()
    {
        $result = $this->client->GetDECTHandsetList();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getDECTHandsetInfo
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewDectID (ui2)
     * out: NewHandsetName (string)
     * out: NewPhonebookID (ui2)
     *
     * @param int $dectID
     * @return array
     */
    public function getDECTHandsetInfo($dectID)
    {
        $result = $this->client->GetDECTHandsetInfo(
            new \SoapParam($dectID, 'NewDectID'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setDECTHandsetPhonebook
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewDectID (ui2)
     * in: NewPhonebookID (ui2)
     *
     * @param int $dectID
     * @param int $phonebookID
     * @return void
     */
    public function setDECTHandsetPhonebook($dectID, $phonebookID)
    {
        $result = $this->client->SetDECTHandsetPhonebook(
            new \SoapParam($dectID, 'NewDectID'),
            new \SoapParam($phonebookID, 'NewPhonebookID'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getNumberOfDeflections
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewNumberOfDeflections (ui2)
     *
     * @return int
     */
    public function getNumberOfDeflections()
    {
        $result = $this->client->GetNumberOfDeflections();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getDeflection
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewDeflectionId (ui2)
     * out: NewEnable (boolean)
     * out: NewType (string)
     * out: NewNumber (string)
     * out: NewDeflectionToNumber (string)
     * out: NewMode (string)
     * out: NewOutgoing (string)
     * out: NewPhonebookID (ui2)
     *
     * @param int $deflectionId
     * @return array
     */
    public function getDeflection($deflectionId)
    {
        $result = $this->client->GetDeflection(
            new \SoapParam($deflectionId, 'NewDeflectionId'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getDeflections
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewDeflectionList (string)
     *
     * @return string
     */
    public function getDeflections()
    {
        $result = $this->client->GetDeflections();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setDeflectionEnable
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewDeflectionId (ui2)
     * in: NewEnable (boolean)
     *
     * @param int $deflectionId
     * @param bool $enable
     * @return void
     */
    public function setDeflectionEnable($deflectionId, $enable)
    {
        $result = $this->client->SetDeflectionEnable(
            new \SoapParam($deflectionId, 'NewDeflectionId'),
            new \SoapParam($enable, 'NewEnable'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

// +++ Additional functions not directly related to an action +++

    /**
     * return a simple array of all numbers from a designated
     * phone book according to $types - if you want only numbers
     * of a type: e.g. home, work, mobil, fax, fax_work
     * Internal numbers beginning with '*' or '#' are skipped
     *
     * @param SimpleXMLElement $phoneBook
     * @param array $types
     * @return array $numbers
     */
    public function getListOfPhoneNumbers($phoneBook, $types = [])
    {
        $numbers = [];
        foreach ($phoneBook->phonebook->contact as $contact) {
            foreach ($contact->telephony->number as $number) {
                if ((substr($number, 0, 1) == '*') || (substr($number, 0, 1) == '#')) {
                    continue;
                }
                if (count($types)) {
                    if (in_array($number['type'], $types)) {
                        $phoneNumber = (string)$number[0];
                    } else {
                        continue;
                    }
                } else {
                    $phoneNumber = (string)$number[0];
                }
                $numbers[] = $phoneNumber;
            }
        }

        return $numbers;
    }

    /**
     * return a minimal viable xml contact structure
     * according to AVM phonebook requirements:
     *
     * <?xml version="1.0" encoding="utf-8"?>
     * <entry">
     *     <contact>
     *         <person>
     *             <realName>$caller</realName>
     *         </person>
     *         <telephony>
     *             <number id="0" type=$type>$number</number>
     *         </telephony>
     *         ...
     *     </contact>
     * </entry>
     *
     * type='other' apears as "sonstige"
     *
     * @param string $name
     * @param string $number
     * @param string $type phone type (home, work, mobile, fax_work)
     * @return string XML
     */
    public function newContact($name, $number, $type = 'other'): string
    {
        $envelope = new simpleXMLElement('<?xml version="1.0" encoding="utf-8"?><entry />');

        $contact = $envelope->addChild('contact');
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

        return $envelope->asXML();
    }

    /**
     * set a new minimal contact in a phonebook
     *
     * @param int $phonebookID
     * @param string $name <realName>
     * @param string $number <number>
     * @param string $type <type='other'>
     * @return void
     */
    public function setContact($phonebookID, $name, $number, $type = null)
    {
        $this->setPhonebookEntry($this->newContact($name, $number, $type), $phonebookID);
    }
}
