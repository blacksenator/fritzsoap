<?php

namespace blacksenator\fritzsoap;

/**
* The class provides functions to read and manipulate
* data via TR-064 interface on FRITZ!Box router from AVM:
* according to:
* @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/layer3forwardingSCPD.pdf
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

class layer3forwarding extends fritzsoap
{
    /**
     * setDefaultConnectionService
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewDefaultConnectionService
     *
     */
    public function setDefaultConnectionService()
    {
        $result = $this->client->SetDefaultConnectionService();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getDefaultConnectionService
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewDefaultConnectionService
     *
     */
    public function getDefaultConnectionService()
    {
        $result = $this->client->GetDefaultConnectionService();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getForwardNumberOfEntries
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewForwardNumberOfEntries
     *
     */
    public function getForwardNumberOfEntries()
    {
        $result = $this->client->GetForwardNumberOfEntries();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * addForwardingEntry
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewType
     * in: NewDestIPAddress
     * in: NewDestSubnetMask
     * in: NewSourceIPAddress
     * in: NewSourceSubnetMask
     * in: NewGatewayIPAddress
     * in: NewInterface
     * in: NewForwardingMetric
     *
     */
    public function addForwardingEntry()
    {
        $result = $this->client->AddForwardingEntry();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * deleteForwardingEntry
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewDestIPAddress
     * in: NewDestSubnetMask
     * in: NewSourceIPAddress
     * in: NewSourceSubnetMask
     *
     */
    public function deleteForwardingEntry()
    {
        $result = $this->client->DeleteForwardingEntry();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getSpecificForwardingEntry
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewDestIPAddress
     * in: NewDestSubnetMask
     * in: NewSourceIPAddress
     * in: NewSourceSubnetMask
     * out: NewGatewayIPAddress
     * out: NewEnable
     * out: NewStatus
     * out: NewType
     * out: NewInterface
     * out: NewForwardingMetric
     *
     */
    public function getSpecificForwardingEntry()
    {
        $result = $this->client->GetSpecificForwardingEntry();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getGenericForwardingEntry
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewForwardingIndex
     * out: NewEnable
     * out: NewStatus
     * out: NewType
     * out: NewDestIPAddress
     * out: NewDestSubnetMask
     * out: NewSourceIPAddress
     * out: NewSourceSubnetMask
     * out: NewGatewayIPAddress
     * out: NewInterface
     * out: NewForwardingMetric
     *
     */
    public function getGenericForwardingEntry()
    {
        $result = $this->client->GetGenericForwardingEntry();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setForwardingEntryEnable
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewDestIPAddress
     * in: NewDestSubnetMask
     * in: NewSourceIPAddress
     * in: NewSourceSubnetMask
     * in: NewEnable
     *
     */
    public function setForwardingEntryEnable()
    {
        $result = $this->client->SetForwardingEntryEnable();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

}
