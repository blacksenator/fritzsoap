<?php

namespace blacksenator\fritzsoap;

/**
* The class provides functions to read and manipulate
* data via TR-064 interface on FRITZ!Box router from AVM:
* according to:
* @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/wancommonifconfigSCPD.pdf
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

class wancommonifconfig1 extends fritzsoap
{
    /**
     * getCommonLinkProperties
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewWANAccessType
     * out: NewLayer1UpstreamMaxBitRate
     * out: NewLayer1DownstreamMaxBitRate
     * out: NewPhysicalLinkStatus
     *
     */
    public function getCommonLinkProperties()
    {
        $result = $this->client->GetCommonLinkProperties();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * getTotalBytesSent
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewTotalBytesSent
     *
     */
    public function getTotalBytesSent()
    {
        $result = $this->client->GetTotalBytesSent();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * getTotalBytesReceived
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewTotalBytesReceived
     *
     */
    public function getTotalBytesReceived()
    {
        $result = $this->client->GetTotalBytesReceived();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * getTotalPacketsSent
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewTotalPacketsSent
     *
     */
    public function getTotalPacketsSent()
    {
        $result = $this->client->GetTotalPacketsSent();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * getTotalPacketsReceived
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewTotalPacketsReceived
     *
     */
    public function getTotalPacketsReceived()
    {
        $result = $this->client->GetTotalPacketsReceived();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_SetWANAccessType
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewAccessType
     *
     */
    public function x_AVM_DE_SetWANAccessType()
    {
        $result = $this->client->{'X_AVM-DE_SetWANAccessType'}();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetOnlineMonitor
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewSyncGroupIndex
     * out: NewTotalNumberSyncGroups
     * out: NewSyncGroupName
     * out: NewSyncGroupMode
     * out: Newmax_ds
     * out: Newmax_us
     * out: Newds_current_bps
     * out: Newmc_current_bps
     * out: Newus_current_bps
     * out: Newprio_realtime_bps
     * out: Newprio_high_bps
     * out: Newprio_default_bps
     * out: Newprio_low_bps
     *
     */
    public function x_AVM_DE_GetOnlineMonitor()
    {
        $result = $this->client->{'X_AVM-DE_GetOnlineMonitor'}();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

}
