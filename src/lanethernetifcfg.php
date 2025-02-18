<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides functions to read and manipulate data via SOAP interface
 * on FRITZ!Box router from AVM.
 *
 * @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/lanifconfigSCPD.pdf
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

class lanethernetifcfg extends fritzsoap
{
    const
        SERVICE_TYPE = 'urn:dslforum-org:service:LANEthernetInterfaceConfig:1',
        CONTROL_URL  = '/upnp/control/lanethernetifcfg';

    /**
     * setEnable
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewEnable (boolean)
     *
     * @param bool $enable
     * @return void
     */
    public function setEnable($enable)
    {
        $result = $this->client->SetEnable(
            new \SoapParam($enable, 'NewEnable'));
        $this->errorHandling($result, 'Could not ... from/to FRITZ!Box');
    }

    /**
     * getInfo
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewEnable (boolean)
     * out: NewStatus (string)
     * out: NewMACAddress (string)
     * out: NewMaxBitRate (string)
     * out: NewDuplexMode (string)
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
     * getStatistics
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewBytesSent (ui4)
     * out: NewBytesReceived (ui4)
     * out: NewPacketsSent (ui4)
     * out: NewPacketsReceived (ui4)
     *
     * @return array
     */
    public function getStatistics()
    {
        $result = $this->client->GetStatistics();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }
}
