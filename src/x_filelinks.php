<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides functions to read and manipulate data via SOAP interface
 * on FRITZ!Box router from AVM:
 *
 * @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/x_filelinksSCPD.pdf
 *
 * +++++++++++++++++++++ ATTENTION +++++++++++++++++++++
 * THIS FILE IS AUTOMATIC ASSEMBLED BUT PARTLY REVIEWED!
 * ALL FUNCTIONS ARE FRAMEWORKS AND HAVE TO BE CORRECTLY
 * CODED, IF THEIR COMMENT WAS NOT OVERWRITTEN!
 * +++++++++++++++++++++++++++++++++++++++++++++++++++++
 *
 * @author Volker Püschel <knuffy@anasco.de>
 * @copyright Volker Püschel 2019 - 2025
 * @license MIT
**/

use blacksenator\fritzsoap\fritzsoap;

class x_filelinks extends fritzsoap
{
    const
        SERVICE_TYPE = 'urn:dslforum-org:service:X_AVM-DE_Filelinks:1',
        CONTROL_URL  = '/upnp/control/x_filelinks';

    /**
     * getNumberOfFilelinkEntries
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewNumberOfEntries (ui2)
     *
     * @return int
     */
    public function getNumberOfFilelinkEntries()
    {
        $result = $this->client->GetNumberOfFilelinkEntries();
        if ($this->errorHandling($result, 'Could not get number of file link entries from FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getGenericFilelinkEntry
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewIndex (ui2)
     * out: NewID (string)
     * out: NewValid (boolean)
     * out: NewPath (string)
     * out: NewIsDirectory (boolean)
     * out: NewUrl (string)
     * out: NewUsername (string)
     * out: NewAccessCountLimit (ui2)
     * out: NewAccessCount (ui2)
     * out: NewExpire (ui2)
     * out: NewExpireDate (dateTime)
     *
     * @param int $index
     * @return array
     */
    public function getGenericFilelinkEntry($index)
    {
        $result = $this->client->GetGenericFilelinkEntry(
            new \SoapParam($index, 'NewIndex'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getSpecificFilelinkEntry
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewID (string)
     * out: NewValid (boolean)
     * out: NewPath (string)
     * out: NewIsDirectory (boolean)
     * out: NewUrl (string)
     * out: NewUsername (string)
     * out: NewAccessCountLimit (ui2)
     * out: NewAccessCount (ui2)
     * out: NewExpire (ui2)
     * out: NewExpireDate (dateTime)
     *
     * @param string $iD
     * @return array
     */
    public function getSpecificFilelinkEntry($iD)
    {
        $result = $this->client->GetSpecificFilelinkEntry(
            new \SoapParam($iD, 'NewID'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * newFilelinkEntry
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewPath (string)
     * in: NewAccessCountLimit (ui2)
     * in: NewExpire (ui2)
     * out: NewID (string)
     *
     * @param string $path
     * @param int $accessCountLimit
     * @param int $expire
     * @return string
     */
    public function newFilelinkEntry($path, $accessCountLimit, $expire)
    {
        $result = $this->client->NewFilelinkEntry(
            new \SoapParam($path, 'NewPath'),
            new \SoapParam($accessCountLimit, 'NewAccessCountLimit'),
            new \SoapParam($expire, 'NewExpire'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setFilelinkEntry
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewID (string)
     * in: NewAccessCountLimit (ui2)
     * in: NewExpire (ui2)
     *
     * @param string $iD
     * @param int $accessCountLimit
     * @param int $expire
     * @return void
     */
    public function setFilelinkEntry($iD, $accessCountLimit, $expire)
    {
        $result = $this->client->SetFilelinkEntry(
            new \SoapParam($iD, 'NewID'),
            new \SoapParam($accessCountLimit, 'NewAccessCountLimit'),
            new \SoapParam($expire, 'NewExpire'));
        $this->errorHandling($result, 'Could not ... from/to FRITZ!Box');
    }

    /**
     * deleteFilelinkEntry
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewID (string)
     *
     * @param string $iD
     * @return void
     */
    public function deleteFilelinkEntry($iD)
    {
        $result = $this->client->DeleteFilelinkEntry(
            new \SoapParam($iD, 'NewID'));
        $this->errorHandling($result, 'Could not ... from/to FRITZ!Box');
    }

    /**
     * getFilelinkListPath
     *
     * get a XML list with file links
     *
     * @return SimpleXMLElement
     */
    public function getFilelinkListPath()
    {
        $result = $this->client->GetFilelinkListPath();
        if ($this->errorHandling($result, 'Could not receive the file link list from FRITZ!Box')) {
            return;
        }

        return file_get_contents($this->fritzBoxURL . $result);
    }
}
