<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides functions to read and manipulate data via SOAP interface
 * on FRITZ!Box router from AVM:
 *
 * @see https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/IGD2.pdf
 * @see http://upnp.org/specs/gw/UPnP-gw-InternetGatewayDevice-v2-Device.pdf
 * @see http://upnp.org/specs/gw/UPnP-gw-WANIPv6FirewallControl-v2-Service.pdf
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

class WANIPv6Firewall1_2 extends fritzsoap
{
    const
        SERVICE_TYPE = 'urn:schemas-upnp-org:service:WANIPv6FirewallControl:1',
        CONTROL_URL  = '/igd2upnp/control/WANIPv6Firewall1';

    /**
     * getFirewallStatus
     *
     * automatically generated; complete coding if necessary!
     *
     * out: FirewallEnabled (boolean)
     * out: InboundPinholeAllowed (boolean)
     *
     * @return array
     */
    public function getFirewallStatus()
    {
        $result = $this->client->GetFirewallStatus();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getOutboundPinholeTimeout
     *
     * automatically generated; complete coding if necessary!
     * ACTION IS NOT IN THE FILE ABOVE DOCUMENTED!
     *
     * in: RemoteHost (string)
     * in: RemotePort (ui2)
     * in: InternalClient (string)
     * in: InternalPort (ui2)
     * in: Protocol (ui2)
     * out: OutboundPinholeTimeout (ui4)
     *
     * @param string $remoteHost
     * @param int $remotePort
     * @param string $internalClient
     * @param int $internalPort
     * @param int $protocol
     * @return int
     */
    public function getOutboundPinholeTimeout($remoteHost, $remotePort, $internalClient, $internalPort, $protocol)
    {
        $result = $this->client->GetOutboundPinholeTimeout(
            new \SoapParam($remoteHost, 'RemoteHost'),
            new \SoapParam($remotePort, 'RemotePort'),
            new \SoapParam($internalClient, 'InternalClient'),
            new \SoapParam($internalPort, 'InternalPort'),
            new \SoapParam($protocol, 'Protocol'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * addPinhole
     *
     * automatically generated; complete coding if necessary!
     *
     * in: RemoteHost (string)
     * in: RemotePort (ui2)
     * in: InternalClient (string)
     * in: InternalPort (ui2)
     * in: Protocol (ui2)
     * in: LeaseTime (ui4)
     * out: UniqueID (ui2)
     *
     * @param string $remoteHost
     * @param int $remotePort
     * @param string $internalClient
     * @param int $internalPort
     * @param int $protocol
     * @param int $leaseTime
     * @return int
     */
    public function addPinhole($remoteHost, $remotePort, $internalClient, $internalPort, $protocol, $leaseTime)
    {
        $result = $this->client->AddPinhole(
            new \SoapParam($remoteHost, 'RemoteHost'),
            new \SoapParam($remotePort, 'RemotePort'),
            new \SoapParam($internalClient, 'InternalClient'),
            new \SoapParam($internalPort, 'InternalPort'),
            new \SoapParam($protocol, 'Protocol'),
            new \SoapParam($leaseTime, 'LeaseTime'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * updatePinhole
     *
     * automatically generated; complete coding if necessary!
     *
     * in: UniqueID (ui2)
     * in: NewLeaseTime (ui4)
     *
     * @param int $uniqueID
     * @param int $leaseTime
     * @return void
     */
    public function updatePinhole($uniqueID, $leaseTime)
    {
        $result = $this->client->UpdatePinhole(
            new \SoapParam($uniqueID, 'UniqueID'),
            new \SoapParam($leaseTime, 'NewLeaseTime'));
        $this->errorHandling($result, 'Could not ... from/to FRITZ!Box');
    }

    /**
     * deletePinhole
     *
     * automatically generated; complete coding if necessary!
     *
     * in: UniqueID (ui2)
     *
     * @param int $uniqueID
     * @return void
     */
    public function deletePinhole($uniqueID)
    {
        $result = $this->client->DeletePinhole(
            new \SoapParam($uniqueID, 'UniqueID'));
        $this->errorHandling($result, 'Could not ... from/to FRITZ!Box');
    }

    /**
     * getPinholePackets
     *
     * automatically generated; complete coding if necessary!
     * ACTION IS NOT IN THE FILE ABOVE DOCUMENTED!
     *
     * in: UniqueID (ui2)
     * out: PinholePackets (ui4)
     *
     * @param int $uniqueID
     * @return int
     */
    public function getPinholePackets($uniqueID)
    {
        $result = $this->client->GetPinholePackets(
            new \SoapParam($uniqueID, 'UniqueID'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * checkPinholeWorking
     *
     * automatically generated; complete coding if necessary!
     * ACTION IS NOT IN THE FILE ABOVE DOCUMENTED!
     *
     * in: UniqueID (ui2)
     * out: IsWorking (boolean)
     *
     * @param int $uniqueID
     * @return bool
     */
    public function checkPinholeWorking($uniqueID)
    {
        $result = $this->client->CheckPinholeWorking(
            new \SoapParam($uniqueID, 'UniqueID'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }
}
