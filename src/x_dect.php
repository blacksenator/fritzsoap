<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides functions to read and manipulate data via SOAP interface
 * on FRITZ!Box router from AVM:
 *
 * @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/x_dectSCPD.pdf
 *
 * In addition to the designated functions for each action, this class contains
 * further functions:
 * - getDectList()
 *
 * @author Volker Püschel <knuffy@anasco.de>
 * @copyright Volker Püschel 2019 - 2025
 * @license MIT
**/

use blacksenator\fritzsoap\fritzsoap;

class x_dect extends fritzsoap
{
    const
        SERVICE_TYPE = 'urn:dslforum-org:service:X_AVM-DE_Dect:1',
        CONTROL_URL  = '/upnp/control/x_dect';

    /**
     * getNumberOfDectEntries
     *
     * Returns the number of dect devices.
     * Required rights: AppRight or PhoneRight or HomeautoRight
     *
     * out: NewNumberOfEntries (ui2)
     *
     * @return int
     */
    public function getNumberOfDectEntries()
    {
        $result = $this->client->GetNumberOfDectEntries();
        if ($this->errorHandling($result, 'Could not get the number of DECT entries from FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getGenericDectEntry
     *
     * Read values/states for dect devices by index. Index can have a value from
     * 0..>NumberOfEntries< from getNumerOfDectEntries().
     * Required rights: AppRight or PhoneRight or HomeautoRight
     *
     * in: NewIndex (ui2)
     * out: NewID (string)
     * out: NewActive (boolean)
     * out: NewName (string)
     * out: NewModel (string)
     * out: NewUpdateAvailable (boolean)
     * out: NewUpdateSuccessful (string)
     * out: NewUpdateInfo (string)
     *
     * @param int $index
     * @return array
     */
    public function getGenericDectEntry($index)
    {
        $result = $this->client->GetGenericDectEntry(
            new \SoapParam($index, 'NewIndex'));
        if ($this->errorHandling($result, sprintf('Could not get data from device #%s at FRITZ!Box', $index))) {
            return;
        }

        return $result;
    }

    /**
     * getSpecificDectEntry
     *
     * Read values/states for dect devices by ID. ID can have a value from 1..6
     * for DECT handsets or 16..415 for DECT ULE devices.
     * Required rights: AppRight or PhoneRight or HomeautoRight
     *
     * in: NewID (string)
     * out: NewActive (boolean)
     * out: NewName (string)
     * out: NewModel (string)
     * out: NewUpdateAvailable (boolean)
     * out: NewUpdateSuccessful (string)
     * out: NewUpdateInfo (string)
     *
     * @param string $iD
     * @return array
     */
    public function getSpecificDectEntry($iD)
    {
        $result = $this->client->GetSpecificDectEntry(
            new \SoapParam($iD, 'NewID'));
        $message = sprintf('Could not get data from device with ID%s from FRITZ!Box', $iD);
        if ($this->errorHandling($result, $message)) {
            return;
        }

        return $result;
    }

    /**
     * dectDoUpdate
     *
     * Trigger to start an update for a dect devices by ID. ID can have a value
     * from 1..6 for DECT handsets or 16..415 for DECT ULE devices.
     * Required rights: AppRight
     *
     * in: NewID (string)
     *
     * @param string $iD
     * @return void
     */
    public function dectDoUpdate($iD)
    {
        $result = $this->client->DectDoUpdate(
            new \SoapParam($iD, 'NewID'));
        $this->errorHandling($result, 'Could not ... from/to FRITZ!Box');
    }

    /**
     * getDectListPath
     *
     * This function is undocumented in x_dectSCPD.pdf!
     * It returns only the path inclusiv SID, but no scheme, host and port!
     * Example: '/devicedectlist.lua?sid=2e295138ae8296aa'
     *
     * out: NewDectListPath (string)
     *
     * @return string
     */
    public function getDectListPath()
    {
        $result = $this->client->GetDectListPath();
        if ($this->errorHandling($result, 'Could not get DECT list path from FRITZ!Box')) {
            return;
        }

        return $result;
    }

    // +++ Additional functions not directly related to an action +++

    /**
     * getDectList
     *
     * returns the list of DECT devices available from the location given with
     * getDectListPath()
     *
     * @return simpleXMLElement
     */
    public function getDectList()
    {
        $url = $this->getServerAdress() . $this->getDectListPath();

        return simplexml_load_file($url);
    }
}
