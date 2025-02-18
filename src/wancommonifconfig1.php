<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides functions to read and manipulate data via SOAP interface
 * on FRITZ!Box router from AVM.
 *
 * @see https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/wancommonifconfigSCPD.pdf
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

class wancommonifconfig1 extends fritzsoap
{
    const
        SERVICE_TYPE = 'urn:dslforum-org:service:WANCommonInterfaceConfig:1',
        CONTROL_URL  = '/upnp/control/wancommonifconfig1';

    /**
     * getCommonLinkProperties
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewWANAccessType (string)
     * out: NewLayer1UpstreamMaxBitRate (ui4)
     * out: NewLayer1DownstreamMaxBitRate (ui4)
     * out: NewPhysicalLinkStatus (string)
     *
     * @return array
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
     * out: NewTotalBytesSent (ui4)
     *
     * @return int
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
     * out: NewTotalBytesReceived (ui4)
     *
     * @return int
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
     * out: NewTotalPacketsSent (ui4)
     *
     * @return int
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
     * out: NewTotalPacketsReceived (ui4)
     *
     * @return int
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
     * x_AVM_DE_SetWANAccessType
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewAccessType (string)
     *
     * @param string $accessType
     * @return void
     */
    public function x_AVM_DE_SetWANAccessType($accessType)
    {
        $result = $this->client->{'X_AVM-DE_SetWANAccessType'}(
            new \SoapParam($accessType, 'NewAccessType'));
        $this->errorHandling($result, 'Could not ... from/to FRITZ!Box');
    }

    /**
     * x_AVM_DE_GetOnlineMonitor
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewSyncGroupIndex (ui4)
     * out: NewTotalNumberSyncGroups (ui4)
     * out: NewSyncGroupName (string)
     * out: NewSyncGroupMode (string)
     * out: Newmax_ds (ui4)
     * out: Newmax_us (ui4)
     * out: Newds_current_bps (string)
     * out: Newmc_current_bps (string)
     * out: Newus_current_bps (string)
     * out: Newprio_realtime_bps (string)
     * out: Newprio_high_bps (string)
     * out: Newprio_default_bps (string)
     * out: Newprio_low_bps (string)
     *
     * @param int $syncGroupIndex
     * @return array
     */
    public function x_AVM_DE_GetOnlineMonitor($syncGroupIndex)
    {
        $result = $this->client->{'X_AVM-DE_GetOnlineMonitor'}(
            new \SoapParam($syncGroupIndex, 'NewSyncGroupIndex'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }
}
