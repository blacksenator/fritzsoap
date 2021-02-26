<?php

namespace blacksenator\fritzsoap;

/**
* The class provides functions to read and manipulate
* data via TR-064 interface on FRITZ!Box router from AVM:
* according to:
* @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/x_homeplugSCPD.pdf
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

class x_homeplug extends fritzsoap
{
    /**
     * getNumberOfDeviceEntries
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewNumberOfEntries
     *
     */
    public function getNumberOfDeviceEntries()
    {
        $result = $this->client->GetNumberOfDeviceEntries();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getGenericDeviceEntry
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewIndex
     * out: NewMACAddress
     * out: NewActive
     * out: NewName
     * out: NewModel
     * out: NewUpdateAvailable
     * out: NewUpdateSuccessful
     *
     */
    public function getGenericDeviceEntry()
    {
        $result = $this->client->GetGenericDeviceEntry();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getSpecificDeviceEntry
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewMACAddress
     * out: NewActive
     * out: NewName
     * out: NewModel
     * out: NewUpdateAvailable
     * out: NewUpdateSuccessful
     *
     */
    public function getSpecificDeviceEntry()
    {
        $result = $this->client->GetSpecificDeviceEntry();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * deviceDoUpdate
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewMACAddress
     *
     */
    public function deviceDoUpdate()
    {
        $result = $this->client->DeviceDoUpdate();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

}
