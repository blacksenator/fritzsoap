<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides functions to read and manipulate data via TR-064 interface
 * on FRITZ!Box router or repeater from AVM:
 *
 * @see https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/x_wanmobileconnSCPD.pdf
 *
 * +++++++++++++++++++++ ATTENTION +++++++++++++++++++++
 * THIS FILE IS AUTOMATIC ASSEMBLED BUT PARTLY REVIEWED!
 * ALL FUNCTIONS ARE FRAMEWORKS AND HAVE TO BE CORRECTLY
 * CODED, IF THEIR COMMENT WAS NOT OVERWRITTEN!
 * +++++++++++++++++++++++++++++++++++++++++++++++++++++
 *
 * @author Volker Püschel <knuffy@anasco.de>
 * @copyright Volker Püschel 2019 - 2023
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
     * automatically generated; complete coding if necessary!
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
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setPIN
     *
     * automatically generated; complete coding if necessary!
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
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setPUK
     *
     * automatically generated; complete coding if necessary!
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
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setAccessTechnology
     *
     * automatically generated; complete coding if necessary!
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
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getAccessTechnology
     *
     * automatically generated; complete coding if necessary!
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
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setEnabledBandCapabilities
     *
     * automatically generated; complete coding if necessary!
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
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getEnabledBandCapabilities
     *
     * automatically generated; complete coding if necessary!
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
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getBandCapabilities
     *
     * automatically generated; complete coding if necessary!
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
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }
}
