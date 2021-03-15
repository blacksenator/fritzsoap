<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides functions to read and manipulate
 * data via TR-064 interface on FRITZ!Box router from AVM:
 *
 * @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/x_speedtestSCPD.pdf
 *
 * +++++++++++++++++++++ ATTENTION +++++++++++++++++++++
 * THIS FILE IS AUTOMATIC ASSEMBLED!
 * ALL FUNCTIONS ARE FRAMEWORKS AND HAVE TO BE CORRECTLY
 * CODED, IF THEIR COMMENT WAS NOT OVERWRITTEN!
 * +++++++++++++++++++++++++++++++++++++++++++++++++++++
 *
 * @author Volker Püschel <knuffy@anasco.de>
 * @copyright Volker Püschel 2019 - 2021
 * @license MIT
**/

use blacksenator\fritzsoap\fritzsoap;

class x_speedtest extends fritzsoap
{
    const
        SERVICE_TYPE = 'urn:dslforum-org:service:X_AVM-DE_Speedtest:1',
        CONTROL_URL  = '/upnp/control/x_speedtest';

    /**
     * getInfo
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewEnableTcp (boolean)
     * out: NewEnableUdp (boolean)
     * out: NewEnableUdpBidirect (boolean)
     * out: NewWANEnableTcp (boolean)
     * out: NewWANEnableUdp (boolean)
     * out: NewPortTcp (ui4)
     * out: NewPortUdp (ui4)
     * out: NewPortUdpBidirect (ui4)
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
     * setConfig
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewEnableTcp (boolean)
     * in: NewEnableUdp (boolean)
     * in: NewEnableUdpBidirect (boolean)
     * in: NewWANEnableTcp (boolean)
     * in: NewWANEnableUdp (boolean)
     *
     * @param bool $enableTcp
     * @param bool $enableUdp
     * @param bool $enableUdpBidirect
     * @param bool $wANEnableTcp
     * @param bool $wANEnableUdp
     * @return void
     */
    public function setConfig($enableTcp, $enableUdp, $enableUdpBidirect, $wANEnableTcp, $wANEnableUdp)
    {
        $result = $this->client->SetConfig(
            new \SoapParam($enableTcp, 'NewEnableTcp'),
            new \SoapParam($enableUdp, 'NewEnableUdp'),
            new \SoapParam($enableUdpBidirect, 'NewEnableUdpBidirect'),
            new \SoapParam($wANEnableTcp, 'NewWANEnableTcp'),
            new \SoapParam($wANEnableUdp, 'NewWANEnableUdp'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

}
