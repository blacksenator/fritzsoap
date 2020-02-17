<?php

namespace blacksenator\fritzsoap;

/**
* The class provides functions to read and manipulate
* data via TR-064 interface on FRITZ!Box router from AVM
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

class WANIPConn1 extends fritzsoap
{
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
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
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
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
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
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * requestTermination
     *
     * automatically generated; complete coding if necessary!
     *
     *
     */
    public function requestTermination()
    {
        $result = $this->client->RequestTermination();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
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
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * setAutoDisconnectTime
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewAutoDisconnectTime
     *
     */
    public function setAutoDisconnectTime()
    {
        $result = $this->client->SetAutoDisconnectTime();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
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
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * setWarnDisconnectDelay
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewWarnDisconnectDelay
     *
     */
    public function setWarnDisconnectDelay()
    {
        $result = $this->client->SetWarnDisconnectDelay();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
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
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * getAutoDisconnectTime
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewAutoDisconnectTime
     *
     */
    public function getAutoDisconnectTime()
    {
        $result = $this->client->GetAutoDisconnectTime();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * getIdleDisconnectTime
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewIdleDisconnectTime
     *
     */
    public function getIdleDisconnectTime()
    {
        $result = $this->client->GetIdleDisconnectTime();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * getWarnDisconnectDelay
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewWarnDisconnectDelay
     *
     */
    public function getWarnDisconnectDelay()
    {
        $result = $this->client->GetWarnDisconnectDelay();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
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
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
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
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
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
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
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
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
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
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
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
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetExternalIPv6Address
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewExternalIPv6Address
     * out: NewPrefixLength
     * out: NewValidLifetime
     * out: NewPreferedLifetime
     *
     */
    public function x_AVM_DE_GetExternalIPv6Address()
    {
        $result = $this->client->X_AVM_DE_GetExternalIPv6Address();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetIPv6Prefix
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewIPv6Prefix
     * out: NewPrefixLength
     * out: NewValidLifetime
     * out: NewPreferedLifetime
     *
     */
    public function x_AVM_DE_GetIPv6Prefix()
    {
        $result = $this->client->X_AVM_DE_GetIPv6Prefix();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetDNSServer
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewIPv4DNSServer1
     * out: NewIPv4DNSServer2
     *
     */
    public function x_AVM_DE_GetDNSServer()
    {
        $result = $this->client->X_AVM_DE_GetDNSServer();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetIPv6DNSServer
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewIPv6DNSServer1
     * out: NewValidLifetime1
     * out: NewIPv6DNSServer2
     * out: NewValidLifetime
     *
     */
    public function x_AVM_DE_GetIPv6DNSServer()
    {
        $result = $this->client->X_AVM_DE_GetIPv6DNSServer();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * deletePortMappingRange
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewStartPort
     * in: NewEndPort
     * in: NewProtocol
     * in: NewManage
     *
     */
    public function deletePortMappingRange()
    {
        $result = $this->client->DeletePortMappingRange();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * getListOfPortMappings
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewStartPort
     * in: NewEndPort
     * in: NewProtocol
     * in: NewManage
     * in: NewNumberOfPorts
     * out: NewPortListing
     *
     */
    public function getListOfPortMappings()
    {
        $result = $this->client->GetListOfPortMappings();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * addAnyPortMapping
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
     * out: NewReservedPort
     *
     */
    public function addAnyPortMapping()
    {
        $result = $this->client->AddAnyPortMapping();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

}
