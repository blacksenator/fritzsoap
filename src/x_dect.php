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
 * @copyright Volker Püschel 2019 - 2021
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
     * out: NewNumberOfEntries (ui2)
     *
     * @return int
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
     * in: NewID (string)
     *
     * @param string $iD
     * @return void
     */
    public function dectDoUpdate($iD)
    {
        $result = $this->client->DectDoUpdate(
            new \SoapParam($iD, 'NewID'));
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
     * out: NewDectListPath (string)
     *
     * @return string
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
