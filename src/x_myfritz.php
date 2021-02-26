<?php

namespace blacksenator\fritzsoap;

/**
* The class provides functions to read and manipulate
* data via TR-064 interface on FRITZ!Box router from AVM:
* according to:
* @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/x_myfritzSCPD.pdf
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

class x_myfritz extends fritzsoap
{
    /**
     * getInfo
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewEnabled
     * out: NewDeviceRegistered
     * out: NewDynDNSName
     * out: NewPort
     *
     */
    public function getInfo()
    {
        $result = $this->client->GetInfo();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getNumberOfServices
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewNumberOfServices
     *
     */
    public function getNumberOfServices()
    {
        $result = $this->client->GetNumberOfServices();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getServiceByIndex
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewIndex
     * out: NewEnabled
     * out: NewName
     * out: NewScheme
     * out: NewPort
     * out: NewURLPath
     * out: NewType
     * out: NewIPv4ForwardingWarning
     * out: NewIPv4Addresses
     * out: NewIPv6Addresses
     * out: NewIPv6InterfaceIDs
     * out: NewMACAddress
     * out: NewHostName
     * out: NewDynDnsLabel
     * out: NewStatus
     *
     */
    public function getServiceByIndex()
    {
        $result = $this->client->GetServiceByIndex();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setServiceByIndex
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewIndex
     * in: NewEnabled
     * in: NewName
     * in: NewScheme
     * in: NewPort
     * in: NewURLPath
     * in: NewType
     * in: NewIPv4Address
     * in: NewIPv6Address
     * in: NewIPv6InterfaceID
     * in: NewMACAddress
     * in: NewHostName
     *
     */
    public function setServiceByIndex()
    {
        $result = $this->client->SetServiceByIndex();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * deleteServiceByIndex
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewIndex
     *
     */
    public function deleteServiceByIndex()
    {
        $result = $this->client->DeleteServiceByIndex();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

}
