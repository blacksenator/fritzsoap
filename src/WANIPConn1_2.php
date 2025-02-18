<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides functions to read and manipulate data via SOAP interface
 * on FRITZ!Box router from AVM:

 * @see https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/IGD2.pdf
 * @see http://upnp.org/specs/gw/UPnP-gw-InternetGatewayDevice-v2-Device.pdf
 * @see http://upnp.org/specs/gw/UPnP-gw-WANIPConnection-v2-Service.pdf
 *
 * +++++++++++++++++++++ ATTENTION +++++++++++++++++++++
 * THIS FILE IS AUTOMATIC ASSEMBLED BUT PARTLY REVIEWED!
 * ALL FUNCTIONS ARE FRAMEWORKS AND HAVE TO BE CORRECTLY
 * CODED, IF THEIR COMMENT WAS NOT OVERWRITTEN!
 * +++++++++++++++++++++++++++++++++++++++++++++++++++++
 *
 * @author Volker Püschel <knuffy@anasco.de>
 * @copyright Volker Püschel 2019 - 2025
 * @license MIT
**/

use blacksenator\fritzsoap\fritzsoap;

class WANIPConn1_2 extends fritzsoap
{
    const
        SERVICE_TYPE = 'urn:schemas-upnp-org:service:WANIPConnection:2',
        CONTROL_URL  = '/igd2upnp/control/WANIPConn1';

    /**
     * setConnectionType
     * ACTION IS NOT IN THE FILE ABOVE DOCUMENTED!
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
     * requestConnection
     *
     * @return void
     */
    public function requestConnection()
    {
        $result = $this->client->RequestConnection();
        if ($this->errorHandling($result, 'Could not reques connection at FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * requestTermination
     *
     * @return void
     */
    public function requestTermination()
    {
        $result = $this->client->RequestTermination();
        if ($this->errorHandling($result, 'Could not request termination at FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * forceTermination
     *
     * @return void
     */
    public function forceTermination()
    {
        $result = $this->client->ForceTermination();
        if ($this->errorHandling($result, 'Could not force termination at FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setAutoDisconnectTime
     * ACTION IS NOT IN THE FILE ABOVE DOCUMENTED!
     *
     * in: NewAutoDisconnectTime (ui4)
     *
     * @param int $autoDisconnectTime
     * @return void
     */
    public function setAutoDisconnectTime($autoDisconnectTime)
    {
        $result = $this->client->SetAutoDisconnectTime(
            new \SoapParam($autoDisconnectTime, 'NewAutoDisconnectTime'));
        if ($this->errorHandling($result, 'Could not set auto disconnection time on FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setIdleDisconnectTime
     * ACTION IS NOT IN THE FILE ABOVE DOCUMENTED!
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
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setWarnDisconnectDelay
     * ACTION IS NOT IN THE FILE ABOVE DOCUMENTED!
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewWarnDisconnectDelay (ui4)
     *
     * @param int $warnDisconnectDelay
     * @return void
     */
    public function setWarnDisconnectDelay($warnDisconnectDelay)
    {
        $result = $this->client->SetWarnDisconnectDelay(
            new \SoapParam($warnDisconnectDelay, 'NewWarnDisconnectDelay'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getStatusInfo
     *
     * returns status info
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
        if ($this->errorHandling($result, 'Could not get status info from FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getAutoDisconnectTime
     *
     * returns auto disconnection time
     *
     * out: NewAutoDisconnectTime (ui4)
     *
     * @return int
     */
    public function getAutoDisconnectTime()
    {
        $result = $this->client->GetAutoDisconnectTime();
        if ($this->errorHandling($result, 'Could not get auto disconnection time from FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getIdleDisconnectTime
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewIdleDisconnectTime (ui4)
     *
     * @return int
     */
    public function getIdleDisconnectTime()
    {
        $result = $this->client->GetIdleDisconnectTime();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getWarnDisconnectDelay
     *
     * automatically generated; complete coding if necessary!
     * ACTION IS NOT IN THE FILE ABOVE DOCUMENTED!
     *
     * out: NewWarnDisconnectDelay (ui4)
     *
     * @return int
     */
    public function getWarnDisconnectDelay()
    {
        $result = $this->client->GetWarnDisconnectDelay();
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
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getExternalIPAddress
     *
     * returns external IP
     *
     * out: NewExternalIPAddress (string)
     *
     * @return string
     */
    public function getExternalIPAddress()
    {
        $result = $this->client->GetExternalIPAddress();
        if ($this->errorHandling($result, 'Could not get external IP from FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetExternalIPv6Address
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewExternalIPv6Address (string)
     * out: NewPrefixLength (ui1)
     * out: NewValidLifetime (ui4)
     * out: NewPreferedLifetime (ui4)
     *
     * @return array
     */
    public function x_AVM_DE_GetExternalIPv6Address()
    {
        $result = $this->client->X_AVM_DE_GetExternalIPv6Address();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetIPv6Prefix
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewIPv6Prefix (string)
     * out: NewPrefixLength (ui1)
     * out: NewValidLifetime (ui4)
     * out: NewPreferedLifetime (ui4)
     *
     * @return array
     */
    public function x_AVM_DE_GetIPv6Prefix()
    {
        $result = $this->client->X_AVM_DE_GetIPv6Prefix();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetDNSServer
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewIPv4DNSServer1 (string)
     * out: NewIPv4DNSServer2 (string)
     *
     * @return array
     */
    public function x_AVM_DE_GetDNSServer()
    {
        $result = $this->client->X_AVM_DE_GetDNSServer();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetIPv6DNSServer
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewIPv6DNSServer1 (string)
     * out: NewValidLifetime1 (ui4)
     * out: NewIPv6DNSServer2 (string)
     * out: NewValidLifetime (ui4)
     *
     * @return array
     */
    public function x_AVM_DE_GetIPv6DNSServer()
    {
        $result = $this->client->X_AVM_DE_GetIPv6DNSServer();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * deletePortMappingRange
     *
     * automatically generated; complete coding if necessary!
     * ACTION IS NOT IN THE FILE ABOVE DOCUMENTED!
     *
     * in: NewStartPort (ui2)
     * in: NewEndPort (ui2)
     * in: NewProtocol (string)
     * in: NewManage (boolean)
     *
     * @param int $startPort
     * @param int $endPort
     * @param string $protocol
     * @param bool $manage
     * @return void
     */
    public function deletePortMappingRange($startPort, $endPort, $protocol, $manage)
    {
        $result = $this->client->DeletePortMappingRange(
            new \SoapParam($startPort, 'NewStartPort'),
            new \SoapParam($endPort, 'NewEndPort'),
            new \SoapParam($protocol, 'NewProtocol'),
            new \SoapParam($manage, 'NewManage'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getListOfPortMappings
     *
     * automatically generated; complete coding if necessary!
     * ACTION IS NOT IN THE FILE ABOVE DOCUMENTED!
     *
     * in: NewStartPort (ui2)
     * in: NewEndPort (ui2)
     * in: NewProtocol (string)
     * in: NewManage (boolean)
     * in: NewNumberOfPorts (ui2)
     * out: NewPortListing (string)
     *
     * @param int $startPort
     * @param int $endPort
     * @param string $protocol
     * @param bool $manage
     * @param int $numberOfPorts
     * @return string
     */
    public function getListOfPortMappings($startPort, $endPort, $protocol, $manage, $numberOfPorts)
    {
        $result = $this->client->GetListOfPortMappings(
            new \SoapParam($startPort, 'NewStartPort'),
            new \SoapParam($endPort, 'NewEndPort'),
            new \SoapParam($protocol, 'NewProtocol'),
            new \SoapParam($manage, 'NewManage'),
            new \SoapParam($numberOfPorts, 'NewNumberOfPorts'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * addAnyPortMapping
     * ACTION IS NOT IN THE FILE ABOVE DOCUMENTED!
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
     * out: NewReservedPort (ui2)
     *
     * @param string $remoteHost
     * @param int $externalPort
     * @param string $protocol
     * @param int $internalPort
     * @param string $internalClient
     * @param bool $enabled
     * @param string $portMappingDescription
     * @param int $leaseDuration
     * @return int
     */
    public function addAnyPortMapping($remoteHost, $externalPort, $protocol, $internalPort, $internalClient, $enabled, $portMappingDescription, $leaseDuration)
    {
        $result = $this->client->AddAnyPortMapping(
            new \SoapParam($remoteHost, 'NewRemoteHost'),
            new \SoapParam($externalPort, 'NewExternalPort'),
            new \SoapParam($protocol, 'NewProtocol'),
            new \SoapParam($internalPort, 'NewInternalPort'),
            new \SoapParam($internalClient, 'NewInternalClient'),
            new \SoapParam($enabled, 'NewEnabled'),
            new \SoapParam($portMappingDescription, 'NewPortMappingDescription'),
            new \SoapParam($leaseDuration, 'NewLeaseDuration'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }
}
