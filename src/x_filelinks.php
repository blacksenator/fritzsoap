<?php

namespace blacksenator\fritzsoap;

/**
* The class provides functions to read and manipulate
* data via TR-064 interface on FRITZ!Box router from AVM:
* according to:
* @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/x_filelinksSCPD.pdf
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
* @copyright Volker Püschel 2021
* @license MIT
**/

use blacksenator\fritzsoap\fritzsoap;
use \SimpleXMLElement;

class x_filelinks extends fritzsoap
{
    /**
     * getNumberOfFilelinkEntries
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewNumberOfEntries
     *
     */
    public function getNumberOfFilelinkEntries()
    {
        $result = $this->client->GetNumberOfFilelinkEntries();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getGenericFilelinkEntry
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewIndex
     * out: NewID
     * out: NewValid
     * out: NewPath
     * out: NewIsDirectory
     * out: NewUrl
     * out: NewUsername
     * out: NewAccessCountLimit
     * out: NewAccessCount
     * out: NewExpire
     * out: NewExpireDate
     *
     */
    public function getGenericFilelinkEntry()
    {
        $result = $this->client->GetGenericFilelinkEntry();
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
     * in: NewID
     * out: NewValid
     * out: NewPath
     * out: NewIsDirectory
     * out: NewUrl
     * out: NewUsername
     * out: NewAccessCountLimit
     * out: NewAccessCount
     * out: NewExpire
     * out: NewExpireDate
     *
     */
    public function getSpecificFilelinkEntry()
    {
        $result = $this->client->GetSpecificFilelinkEntry();
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
     * in: NewPath
     * in: NewAccessCountLimit
     * in: NewExpire
     * out: NewID
     *
     */
    public function newFilelinkEntry()
    {
        $result = $this->client->NewFilelinkEntry();
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
     * in: NewID
     * in: NewAccessCountLimit
     * in: NewExpire
     *
     */
    public function setFilelinkEntry()
    {
        $result = $this->client->SetFilelinkEntry();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * deleteFilelinkEntry
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewID
     *
     */
    public function deleteFilelinkEntry()
    {
        $result = $this->client->DeleteFilelinkEntry();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
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

        return file_get_contents($this->serverAdress . $result);
    }

}
