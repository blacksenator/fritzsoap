<?php

namespace blacksenator\fritzsoap;

/**
* The class provides functions to read and manipulate
* data via TR-064 interface on FRITZ!Box router from AVM.
* No documentation available!
* @see: https://avm.de/service/schnittstellen/
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
* @copyright Volker Püschel 2020
* @license MIT
**/

use blacksenator\fritzsoap\fritzsoap;

class Control5 extends fritzsoap
{
    /**
     * getSearchCapabilities
     *
     * automatically generated; complete coding if necessary!
     *
     * out: SearchCaps
     *
     */
    public function getSearchCapabilities()
    {
        $result = $this->client->GetSearchCapabilities();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * getSortCapabilities
     *
     * automatically generated; complete coding if necessary!
     *
     * out: SortCaps
     *
     */
    public function getSortCapabilities()
    {
        $result = $this->client->GetSortCapabilities();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * getSystemUpdateID
     *
     * automatically generated; complete coding if necessary!
     *
     * out: Id
     *
     */
    public function getSystemUpdateID()
    {
        $result = $this->client->GetSystemUpdateID();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * browse
     *
     * automatically generated; complete coding if necessary!
     *
     * in: ObjectID
     * in: BrowseFlag
     * in: Filter
     * in: StartingIndex
     * in: RequestedCount
     * in: SortCriteria
     * out: Result
     * out: NumberReturned
     * out: TotalMatches
     * out: UpdateID
     *
     */
    public function browse()
    {
        $result = $this->client->Browse();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * search
     *
     * automatically generated; complete coding if necessary!
     *
     * in: ContainerID
     * in: SearchCriteria
     * in: Filter
     * in: StartingIndex
     * in: RequestedCount
     * in: SortCriteria
     * out: Result
     * out: NumberReturned
     * out: TotalMatches
     * out: UpdateID
     *
     */
    public function search()
    {
        $result = $this->client->Search();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

}
