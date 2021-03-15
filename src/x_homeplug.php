<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides functions to read and manipulate
 * data via TR-064 interface on FRITZ!Box router from AVM:
 *
 * @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/x_homeplugSCPD.pdf
 *
 * +++++++++++++++++++++ ATTENTION +++++++++++++++++++++
 * THIS FILE IS AUTOMATIC ASSEMBLED!
 * ALL FUNCTIONS ARE FRAMEWORKS AND HAVE TO BE CORRECTLY
 * CODED, IF THEIR COMMENT WAS NOT OVERWRITTEN!
 * +++++++++++++++++++++++++++++++++++++++++++++++++++++
 *
 * @author Volker Püschel <knuffy@anasco.de>
 * @copyright Volker Püschel 2019 - 2021
 * @license MIT
**/

use blacksenator\fritzsoap\fritzsoap;

class x_homeplug extends fritzsoap
{
    const
        SERVICE_TYPE = 'urn:dslforum-org:service:X_AVM-DE_Homeplug:1',
        CONTROL_URL  = '/upnp/control/x_homeplug';

    /**
     * getNumberOfDeviceEntries
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewNumberOfEntries (ui2)
     *
     * @return int
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
     * in: NewIndex (ui2)
     * out: NewMACAddress (string)
     * out: NewActive (boolean)
     * out: NewName (string)
     * out: NewModel (string)
     * out: NewUpdateAvailable (boolean)
     * out: NewUpdateSuccessful (string)
     *
     * @param int $index
     * @return array
     */
    public function getGenericDeviceEntry($index)
    {
        $result = $this->client->GetGenericDeviceEntry(
            new \SoapParam($index, 'NewIndex'));
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
     * in: NewMACAddress (string)
     * out: NewActive (boolean)
     * out: NewName (string)
     * out: NewModel (string)
     * out: NewUpdateAvailable (boolean)
     * out: NewUpdateSuccessful (string)
     *
     * @param string $mACAddress
     * @return array
     */
    public function getSpecificDeviceEntry($mACAddress)
    {
        $result = $this->client->GetSpecificDeviceEntry(
            new \SoapParam($mACAddress, 'NewMACAddress'));
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
     * in: NewMACAddress (string)
     *
     * @param string $mACAddress
     * @return void
     */
    public function deviceDoUpdate($mACAddress)
    {
        $result = $this->client->DeviceDoUpdate(
            new \SoapParam($mACAddress, 'NewMACAddress'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

}
