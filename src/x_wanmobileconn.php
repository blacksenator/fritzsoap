<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides functions to read and manipulate data via SOAP interface
 * on FRITZ!Box router or repeater from AVM:
 *
 * @see https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/x_wanmobileconnSCPD.pdf
 *
 * @author Volker Püschel <knuffy@anasco.de>
 * @copyright Volker Püschel 2019 - 2025
 * @license MIT
**/

use blacksenator\fritzsoap\fritzsoap;

class x_wanmobileconn extends fritzsoap
{
    const
        SERVICE_TYPE = 'urn:dslforum-org:service:X_AVM-DE_WANMobileConnection:1',
        CONTROL_URL  = '/upnp/control/x_wanmobileconn';

    /**
     * getInfo
     *
     * out: NewEnabled (boolean)
     * out: NewStatus (string)
     * out: NewPINFailureCount (ui2)
     * out: NewPUKFailureCount (ui2)
     *
     * @return array
     */
    public function getInfo()
    {
        $result = $this->client->GetInfo();
        if ($this->errorHandling($result, 'Could not get info from FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getInfoEx
     *
     * out: NewSerialNumber (string)
     * out: NewEnableVoIPPDN (boolean)
     * out: NewPPPUsername (string)
     * out: NewPPPUsernameVoIP (string)
     * out: NewSoftwareVersion (string)
     * out: NewUptime (ui4)
     * out: NewPDN1_MTU (ui4)
     * out: NewPDN2_MTU (ui4)
     * out: NewIMSI (string)
     * out: NewAPN_VoIP (string)
     * out: NewAPN (string)
     * out: NewRoaming (boolean)
     * out: NewCurrentAccessTechnology (string)
     * out: NewSignalRSRP0 (i4)
     * out: NewSignalRSRP1 (i4)
     * out: NewCellList (string)
     *
     * @return array
     */
    public function getInfoEx()
    {
        $result = $this->client->GetInfoEx();
        if ($this->errorHandling($result, 'Could not get extended info from FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setPIN
     *
     * in: NewPIN (string)
     *
     * @param string $pIN
     * @return void
     */
    public function setPIN($pIN)
    {
        $result = $this->client->SetPIN(
            new \SoapParam($pIN, 'NewPIN'));
        $this->errorHandling($result, 'Could not set PIN on FRITZ!Box');
    }

    /**
     * setPUK
     *
     * in: NewPIN (string)
     * in: NewPUK (string)
     *
     * @param string $pIN
     * @param string $pUK
     * @return void
     */
    public function setPUK($pIN, $pUK)
    {
        $result = $this->client->SetPUK(
            new \SoapParam($pIN, 'NewPIN'),
            new \SoapParam($pUK, 'NewPUK'));
        $this->errorHandling($result, 'Could not set PUK on FRITZ!Box');
    }

    /**
     * setAccessTechnology
     *
     * in: NewAccessTechnology (string)
     *
     * @param string $accessTechnology
     * @return void
     */
    public function setAccessTechnology($accessTechnology)
    {
        $result = $this->client->SetAccessTechnology(
            new \SoapParam($accessTechnology, 'NewAccessTechnology'));
        $this->errorHandling($result, 'Could not set access technology at FRITZ!Box');
    }

    /**
     * getAccessTechnology
     *
     * out: NewAccessTechnology (string)
     * out: NewPossibleAccessTechnology (string)
     * out: NewCurrentAccessTechnology (string)
     *
     * @return array
     */
    public function getAccessTechnology()
    {
        $result = $this->client->GetAccessTechnology();
        if ($this->errorHandling($result, 'Could not get access technology from FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setEnabledBandCapabilities
     *
     * in: NewBandCapabilitiesLTE (string)
     * in: NewBandCapabilities5GNSA (string)
     * in: NewBandCapabilities5GSA (string)
     *
     * @param string $bandCapabilitiesLTE
     * @param string $bandCapabilities5GNSA
     * @param string $bandCapabilities5GSA
     * @return void
     */
    public function setEnabledBandCapabilities($bandCapabilitiesLTE, $bandCapabilities5GNSA, $bandCapabilities5GSA)
    {
        $result = $this->client->SetEnabledBandCapabilities(
            new \SoapParam($bandCapabilitiesLTE, 'NewBandCapabilitiesLTE'),
            new \SoapParam($bandCapabilities5GNSA, 'NewBandCapabilities5GNSA'),
            new \SoapParam($bandCapabilities5GSA, 'NewBandCapabilities5GSA'));
        $this->errorHandling($result, 'Could not set enabled band capabilities at FRITZ!Box');
    }

    /**
     * getEnabledBandCapabilities
     *
     * out: NewBandCapabilitiesLTE (string)
     * out: NewBandCapabilities5GNSA (string)
     * out: NewBandCapabilities5GSA (string)
     *
     * @return array
     */
    public function getEnabledBandCapabilities()
    {
        $result = $this->client->GetEnabledBandCapabilities();
        if ($this->errorHandling($result, 'Could not get enable band capabilities from FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getBandCapabilities
     *
     * out: NewBandCapabilitiesLTE (string)
     * out: NewBandCapabilities5GNSA (string)
     * out: NewBandCapabilities5GSA (string)
     *
     * @return array
     */
    public function getBandCapabilities()
    {
        $result = $this->client->GetBandCapabilities();
        if ($this->errorHandling($result, 'Could not get band capabilities from FRITZ!Box')) {
            return;
        }

        return $result;
    }
}
