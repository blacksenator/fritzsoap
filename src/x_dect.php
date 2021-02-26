<?php

namespace blacksenator\fritzsoap;

/**
* The class provides functions to read and manipulate
* data via TR-064 interface on FRITZ!Box router from AVM:
* according to:
* @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/x_dectSCPD.pdf
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
* THIS FILE IS AUTOMATIC ASSEMBLED!
* ALL FUNCTIONS ARE FRAMEWORKS AND HAVE TO BE CORRECTLY
* CODED, IF THEIR COMMENT WAS NOT OVERWRITTEN!
* +++++++++++++++++++++++++++++++++++++++++++++++++++++
*
* @author Volker Püschel <knuffy@anasco.de>
* @copyright Volker Püschel 2021
* @license MIT
**/

use blacksenator\fritzsoap\fritzsoap;

class x_dect extends fritzsoap
{
    /**
     * getNumberOfDectEntries
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewNumberOfEntries
     *
     */
    public function getNumberOfDectEntries()
    {
        $result = $this->client->GetNumberOfDectEntries();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getGenericDectEntry
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewIndex
     * out: NewID
     * out: NewActive
     * out: NewName
     * out: NewModel
     * out: NewUpdateAvailable
     * out: NewUpdateSuccessful
     * out: NewUpdateInfo
     *
     */
    public function getGenericDectEntry()
    {
        $result = $this->client->GetGenericDectEntry();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getSpecificDectEntry
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewID
     * out: NewActive
     * out: NewName
     * out: NewModel
     * out: NewUpdateAvailable
     * out: NewUpdateSuccessful
     * out: NewUpdateInfo
     *
     */
    public function getSpecificDectEntry()
    {
        $result = $this->client->GetSpecificDectEntry();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * dectDoUpdate
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewID
     *
     */
    public function dectDoUpdate()
    {
        $result = $this->client->DectDoUpdate();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getDectListPath
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewDectListPath
     *
     */
    public function getDectListPath()
    {
        $result = $this->client->GetDectListPath();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

}
