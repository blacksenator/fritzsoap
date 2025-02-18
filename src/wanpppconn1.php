<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides functions to read and manipulate data via SOAP interface
 * on FRITZ!Box router from AVM.
 *
 * @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/wanpppconnSCPD.pdf
 *
 * +++++++++++++++++++++ ATTENTION +++++++++++++++++++++
 * THIS FILE IS AUTOMATIC ASSEMBLED!
 * ALL FUNCTIONS ARE FRAMEWORKS AND HAVE TO BE CORRECTLY
 * CODED, IF THEIR COMMENT WAS NOT OVERWRITTEN!
 * +++++++++++++++++++++++++++++++++++++++++++++++++++++
 *
 * @author Volker Püschel <knuffy@anasco.de>
 * @copyright Volker Püschel 2019 - 2025
 * @license MIT
**/

use blacksenator\fritzsoap\fritzsoap;

class wanpppconn1 extends fritzsoap
{
    const
        SERVICE_TYPE = 'urn:dslforum-org:service:WANPPPConnection:1',
        CONTROL_URL  = '/upnp/control/wanpppconn1';

    /**
     * getInfo
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewEnable (boolean)
     * out: NewConnectionStatus (string)
     * out: NewPossibleConnectionTypes (string)
     * out: NewConnectionType (string)
     * out: NewName (string)
     * out: NewUptime (ui4)
     * out: NewUpstreamMaxBitRate (ui4)
     * out: NewDownstreamMaxBitRate (ui4)
     * out: NewLastConnectionError (string)
     * out: NewIdleDisconnectTime (ui4)
     * out: NewRSIPAvailable (boolean)
     * out: NewUserName (string)
     * out: NewNATEnabled (boolean)
     * out: NewExternalIPAddress (string)
     * out: NewDNSServers (string)
     * out: NewMACAddress (string)
     * out: NewConnectionTrigger (string)
     * out: NewLastAuthErrorInfo (string)
     * out: NewMaxCharsUsername (ui2)
     * out: NewMinCharsUsername (ui2)
     * out: NewAllowedCharsUsername (string)
     * out: NewMaxCharsPassword (ui2)
     * out: NewMinCharsPassword (ui2)
     * out: NewAllowedCharsPassword (string)
     * out: NewTransportType (string)
     * out: NewRouteProtocolRx (string)
     * out: NewPPPoEServiceName (string)
     * out: NewRemoteIPAddress (string)
     * out: NewPPPoEACName (string)
     * out: NewDNSEnabled (boolean)
     * out: NewDNSOverrideAllowed (boolean)
     *
     * @return array
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
     * out: NewConnectionType (string)
     * out: NewPossibleConnectionTypes (string)
     *
     * @return array
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
     * in: NewConnectionType (string)
     *
     * @param string $connectionType
     * @return void
     */
    public function setConnectionType($connectionType)
    {
        $result = $this->client->SetConnectionType(
            new \SoapParam($connectionType, 'NewConnectionType'));
        $this->errorHandling($result, 'Could not ... from/to FRITZ!Box');
    }

    /**
     * getStatusInfo
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewConnectionStatus (string)
     * out: NewLastConnectionError (string)
     * out: NewUptime (ui4)
     *
     * @return array
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
     * getUserName
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewUserName (string)
     *
     * @return string
     */
    public function getUserName()
    {
        $result = $this->client->GetUserName();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setUserName
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewUserName (string)
     *
     * @param string $userName
     * @return void
     */
    public function setUserName($userName)
    {
        $result = $this->client->SetUserName(
            new \SoapParam($userName, 'NewUserName'));
        $this->errorHandling($result, 'Could not ... from/to FRITZ!Box');
    }

    /**
     * setPassword
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewPassword (string)
     *
     * @param string $password
     * @return void
     */
    public function setPassword($password)
    {
        $result = $this->client->SetPassword(
            new \SoapParam($password, 'NewPassword'));
        $this->errorHandling($result, 'Could not ... from/to FRITZ!Box');
    }

    /**
     * getNATRSIPStatus
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewRSIPAvailable (boolean)
     * out: NewNATEnabled (boolean)
     *
     * @return array
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
     * in: NewConnectionTrigger (string)
     *
     * @param string $connectionTrigger
     * @return void
     */
    public function setConnectionTrigger($connectionTrigger)
    {
        $result = $this->client->SetConnectionTrigger(
            new \SoapParam($connectionTrigger, 'NewConnectionTrigger'));
        $this->errorHandling($result, 'Could not ... from/to FRITZ!Box');
    }

    /**
     * forceTermination
     *
     * automatically generated; complete coding if necessary!
     *
     * @return void
     */
    public function forceTermination()
    {
        $result = $this->client->ForceTermination();
        $this->errorHandling($result, 'Could not ... from/to FRITZ!Box');
    }

    /**
     * requestConnection
     *
     * automatically generated; complete coding if necessary!
     *
     * @return void
     */
    public function requestConnection()
    {
        $result = $this->client->RequestConnection();
        $this->errorHandling($result, 'Could not ... from/to FRITZ!Box');
    }

    /**
     * getGenericPortMappingEntry
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewPortMappingIndex (ui2)
     * out: NewRemoteHost (string)
     * out: NewExternalPort (ui2)
     * out: NewProtocol (string)
     * out: NewInternalPort (ui2)
     * out: NewInternalClient (string)
     * out: NewEnabled (boolean)
     * out: NewPortMappingDescription (string)
     * out: NewLeaseDuration (ui4)
     *
     * @param int $portMappingIndex
     * @return array
     */
    public function getGenericPortMappingEntry($portMappingIndex)
    {
        $result = $this->client->GetGenericPortMappingEntry(
            new \SoapParam($portMappingIndex, 'NewPortMappingIndex'));
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
     * in: NewRemoteHost (string)
     * in: NewExternalPort (ui2)
     * in: NewProtocol (string)
     * out: NewInternalPort (ui2)
     * out: NewInternalClient (string)
     * out: NewEnabled (boolean)
     * out: NewPortMappingDescription (string)
     * out: NewLeaseDuration (ui4)
     *
     * @param string $remoteHost
     * @param int $externalPort
     * @param string $protocol
     * @return array
     */
    public function getSpecificPortMappingEntry($remoteHost, $externalPort, $protocol)
    {
        $result = $this->client->GetSpecificPortMappingEntry(
            new \SoapParam($remoteHost, 'NewRemoteHost'),
            new \SoapParam($externalPort, 'NewExternalPort'),
            new \SoapParam($protocol, 'NewProtocol'));
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
     * in: NewRemoteHost (string)
     * in: NewExternalPort (ui2)
     * in: NewProtocol (string)
     * in: NewInternalPort (ui2)
     * in: NewInternalClient (string)
     * in: NewEnabled (boolean)
     * in: NewPortMappingDescription (string)
     * in: NewLeaseDuration (ui4)
     *
     * @param string $remoteHost
     * @param int $externalPort
     * @param string $protocol
     * @param int $internalPort
     * @param string $internalClient
     * @param bool $enabled
     * @param string $portMappingDescription
     * @param int $leaseDuration
     * @return void
     */
    public function addPortMapping($remoteHost, $externalPort, $protocol, $internalPort, $internalClient, $enabled, $portMappingDescription, $leaseDuration)
    {
        $result = $this->client->AddPortMapping(
            new \SoapParam($remoteHost, 'NewRemoteHost'),
            new \SoapParam($externalPort, 'NewExternalPort'),
            new \SoapParam($protocol, 'NewProtocol'),
            new \SoapParam($internalPort, 'NewInternalPort'),
            new \SoapParam($internalClient, 'NewInternalClient'),
            new \SoapParam($enabled, 'NewEnabled'),
            new \SoapParam($portMappingDescription, 'NewPortMappingDescription'),
            new \SoapParam($leaseDuration, 'NewLeaseDuration'));
        $this->errorHandling($result, 'Could not ... from/to FRITZ!Box');
    }

    /**
     * deletePortMapping
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewRemoteHost (string)
     * in: NewExternalPort (ui2)
     * in: NewProtocol (string)
     *
     * @param string $remoteHost
     * @param int $externalPort
     * @param string $protocol
     * @return void
     */
    public function deletePortMapping($remoteHost, $externalPort, $protocol)
    {
        $result = $this->client->DeletePortMapping(
            new \SoapParam($remoteHost, 'NewRemoteHost'),
            new \SoapParam($externalPort, 'NewExternalPort'),
            new \SoapParam($protocol, 'NewProtocol'));
        $this->errorHandling($result, 'Could not ... from/to FRITZ!Box');
    }

    /**
     * getExternalIPAddress
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewExternalIPAddress (string)
     *
     * @return string
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
     * out: NewDNSServers (string)
     *
     * @return string
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
     * getLinkLayerMaxBitRates
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewUpstreamMaxBitRate (ui4)
     * out: NewDownstreamMaxBitRate (ui4)
     *
     * @return array
     */
    public function getLinkLayerMaxBitRates()
    {
        $result = $this->client->GetLinkLayerMaxBitRates();
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
     * out: NewPortMappingNumberOfEntries (ui2)
     *
     * @return int
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
     * in: NewRouteProtocolRx (string)
     *
     * @param string $routeProtocolRx
     * @return void
     */
    public function setRouteProtocolRx($routeProtocolRx)
    {
        $result = $this->client->SetRouteProtocolRx(
            new \SoapParam($routeProtocolRx, 'NewRouteProtocolRx'));
        $this->errorHandling($result, 'Could not ... from/to FRITZ!Box');
    }

    /**
     * setIdleDisconnectTime
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewIdleDisconnectTime (ui4)
     *
     * @param int $idleDisconnectTime
     * @return void
     */
    public function setIdleDisconnectTime($idleDisconnectTime)
    {
        $result = $this->client->SetIdleDisconnectTime(
            new \SoapParam($idleDisconnectTime, 'NewIdleDisconnectTime'));
        $this->errorHandling($result, 'Could not ... from/to FRITZ!Box');
    }

    /**
     * x_AVM_DE_GetAutoDisconnectTimeSpan
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewX_AVM-DE_DisconnectPreventionEnable (boolean)
     * out: NewX_AVM-DE_DisconnectPreventionHour (ui2)
     *
     * @return array
     */
    public function x_AVM_DE_GetAutoDisconnectTimeSpan()
    {
        $result = $this->client->{'X_AVM-DE_GetAutoDisconnectTimeSpan'}();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_SetAutoDisconnectTimeSpan
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewX_AVM-DE_DisconnectPreventionEnable (boolean)
     * in: NewX_AVM-DE_DisconnectPreventionHour (ui2)
     *
     * @param bool $x_AVM_DE_DisconnectPreventionEnable
     * @param int $x_AVM_DE_DisconnectPreventionHour
     * @return void
     */
    public function x_AVM_DE_SetAutoDisconnectTimeSpan($x_AVM_DE_DisconnectPreventionEnable, $x_AVM_DE_DisconnectPreventionHour)
    {
        $result = $this->client->{'X_AVM-DE_SetAutoDisconnectTimeSpan'}(
            new \SoapParam($x_AVM_DE_DisconnectPreventionEnable, 'NewX_AVM-DE_DisconnectPreventionEnable'),
            new \SoapParam($x_AVM_DE_DisconnectPreventionHour, 'NewX_AVM-DE_DisconnectPreventionHour'));
        $this->errorHandling($result, 'Could not ... from/to FRITZ!Box');
    }
}
