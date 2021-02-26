<?php

namespace blacksenator\fritzsoap;

/**
* The class provides functions to read and manipulate
* data via TR-064 interface on FRITZ!Box router from AVM:
* according to:
* @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/IGD1.pdf
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

class WANCommonIFC1 extends fritzsoap
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
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
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
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
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
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
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
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
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
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getAddonInfos
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewByteSendRate
     * out: NewByteReceiveRate
     * out: NewPacketSendRate
     * out: NewPacketReceiveRate
     * out: NewTotalBytesSent
     * out: NewTotalBytesReceived
     * out: NewAutoDisconnectTime
     * out: NewIdleDisconnectTime
     * out: NewDNSServer1
     * out: NewDNSServer2
     * out: NewVoipDNSServer1
     * out: NewVoipDNSServer2
     * out: NewUpnpControlEnabled
     * out: NewRoutedBridgedModeBoth
     * out: NewX_AVM_DE_TotalBytesSent64
     * out: NewX_AVM_DE_TotalBytesReceived64
     * out: NewX_AVM_DE_WANAccessType
     *
     */
    public function getAddonInfos()
    {
        $result = $this->client->GetAddonInfos();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetDsliteStatus
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewX_AVM_DE_DsliteStatus
     *
     */
    public function x_AVM_DE_GetDsliteStatus()
    {
        $result = $this->client->X_AVM_DE_GetDsliteStatus();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetIPTVInfos
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewX_AVM_DE_IPTV_Enabled
     * out: NewX_AVM_DE_IPTV_Provider
     * out: NewX_AVM_DE_IPTV_URL
     *
     */
    public function x_AVM_DE_GetIPTVInfos()
    {
        $result = $this->client->X_AVM_DE_GetIPTVInfos();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

}
