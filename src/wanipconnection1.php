<?php

namespace blacksenator\fritzsoap;

/**
* The class provides functions to read and manipulate
* data via TR-064 interface on FRITZ!Box router from AVM:
* according to:
* @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/wanipconnSCPD.pdf
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

class wanipconnection1 extends fritzsoap
{
    /**
     * getInfo
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewEnable
     * out: NewConnectionStatus
     * out: NewPossibleConnectionTypes
     * out: NewConnectionType
     * out: NewName
     * out: NewUptime
     * out: NewLastConnectionError
     * out: NewRSIPAvailable
     * out: NewNATEnabled
     * out: NewExternalIPAddress
     * out: NewDNSServers
     * out: NewMACAddress
     * out: NewConnectionTrigger
     * out: NewRouteProtocolRx
     * out: NewDNSEnabled
     * out: NewDNSOverrideAllowed
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
     * getConnectionTypeInfo
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewConnectionType
     * out: NewPossibleConnectionTypes
     *
     */
    public function getConnectionTypeInfo()
    {
        $result = $this->client->GetConnectionTypeInfo();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setConnectionType
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewConnectionType
     *
     */
    public function setConnectionType()
    {
        $result = $this->client->SetConnectionType();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getStatusInfo
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewConnectionStatus
     * out: NewLastConnectionError
     * out: NewUptime
     *
     */
    public function getStatusInfo()
    {
        $result = $this->client->GetStatusInfo();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getNATRSIPStatus
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewRSIPAvailable
     * out: NewNATEnabled
     *
     */
    public function getNATRSIPStatus()
    {
        $result = $this->client->GetNATRSIPStatus();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setConnectionTrigger
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewConnectionTrigger
     *
     */
    public function setConnectionTrigger()
    {
        $result = $this->client->SetConnectionTrigger();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * forceTermination
     *
     * automatically generated; complete coding if necessary!
     *
     *
     */
    public function forceTermination()
    {
        $result = $this->client->ForceTermination();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * requestConnection
     *
     * automatically generated; complete coding if necessary!
     *
     *
     */
    public function requestConnection()
    {
        $result = $this->client->RequestConnection();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getGenericPortMappingEntry
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewPortMappingIndex
     * out: NewRemoteHost
     * out: NewExternalPort
     * out: NewProtocol
     * out: NewInternalPort
     * out: NewInternalClient
     * out: NewEnabled
     * out: NewPortMappingDescription
     * out: NewLeaseDuration
     *
     */
    public function getGenericPortMappingEntry()
    {
        $result = $this->client->GetGenericPortMappingEntry();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getSpecificPortMappingEntry
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewRemoteHost
     * in: NewExternalPort
     * in: NewProtocol
     * out: NewInternalPort
     * out: NewInternalClient
     * out: NewEnabled
     * out: NewPortMappingDescription
     * out: NewLeaseDuration
     *
     */
    public function getSpecificPortMappingEntry()
    {
        $result = $this->client->GetSpecificPortMappingEntry();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * addPortMapping
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewRemoteHost
     * in: NewExternalPort
     * in: NewProtocol
     * in: NewInternalPort
     * in: NewInternalClient
     * in: NewEnabled
     * in: NewPortMappingDescription
     * in: NewLeaseDuration
     *
     */
    public function addPortMapping()
    {
        $result = $this->client->AddPortMapping();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * deletePortMapping
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewRemoteHost
     * in: NewExternalPort
     * in: NewProtocol
     *
     */
    public function deletePortMapping()
    {
        $result = $this->client->DeletePortMapping();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getExternalIPAddress
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewExternalIPAddress
     *
     */
    public function getExternalIPAddress()
    {
        $result = $this->client->GetExternalIPAddress();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_GetDNSServers
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewDNSServers
     *
     */
    public function x_GetDNSServers()
    {
        $result = $this->client->X_GetDNSServers();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getPortMappingNumberOfEntries
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewPortMappingNumberOfEntries
     *
     */
    public function getPortMappingNumberOfEntries()
    {
        $result = $this->client->GetPortMappingNumberOfEntries();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setRouteProtocolRx
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewRouteProtocolRx
     *
     */
    public function setRouteProtocolRx()
    {
        $result = $this->client->SetRouteProtocolRx();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setIdleDisconnectTime
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewIdleDisconnectTime
     *
     */
    public function setIdleDisconnectTime()
    {
        $result = $this->client->SetIdleDisconnectTime();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

}
