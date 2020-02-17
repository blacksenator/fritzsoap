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

class WANIPv6Firewall1 extends fritzsoap
{
    /**
     * getFirewallStatus
     *
     * automatically generated; complete coding if necessary!
     *
     * out: FirewallEnabled
     * out: InboundPinholeAllowed
     *
     */
    public function getFirewallStatus()
    {
        $result = $this->client->GetFirewallStatus();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * getOutboundPinholeTimeout
     *
     * automatically generated; complete coding if necessary!
     *
     * in: RemoteHost
     * in: RemotePort
     * in: InternalClient
     * in: InternalPort
     * in: Protocol
     * out: OutboundPinholeTimeout
     *
     */
    public function getOutboundPinholeTimeout()
    {
        $result = $this->client->GetOutboundPinholeTimeout();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * addPinhole
     *
     * automatically generated; complete coding if necessary!
     *
     * in: RemoteHost
     * in: RemotePort
     * in: InternalClient
     * in: InternalPort
     * in: Protocol
     * in: LeaseTime
     * out: UniqueID
     *
     */
    public function addPinhole()
    {
        $result = $this->client->AddPinhole();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * updatePinhole
     *
     * automatically generated; complete coding if necessary!
     *
     * in: UniqueID
     * in: NewLeaseTime
     *
     */
    public function updatePinhole()
    {
        $result = $this->client->UpdatePinhole();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * deletePinhole
     *
     * automatically generated; complete coding if necessary!
     *
     * in: UniqueID
     *
     */
    public function deletePinhole()
    {
        $result = $this->client->DeletePinhole();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * getPinholePackets
     *
     * automatically generated; complete coding if necessary!
     *
     * in: UniqueID
     * out: PinholePackets
     *
     */
    public function getPinholePackets()
    {
        $result = $this->client->GetPinholePackets();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * checkPinholeWorking
     *
     * automatically generated; complete coding if necessary!
     *
     * in: UniqueID
     * out: IsWorking
     *
     */
    public function checkPinholeWorking()
    {
        $result = $this->client->CheckPinholeWorking();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

}
