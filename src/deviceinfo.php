<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides functions to read and manipulate data via SOAP interface
 * on FRITZ!Box router from AVM:
 *
 * @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/deviceinfoSCPD.pdf
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

class deviceinfo extends fritzsoap
{
    const
        SERVICE_TYPE = 'urn:dslforum-org:service:DeviceInfo:1',
        CONTROL_URL  = '/upnp/control/deviceinfo';

    /**
     * getInfo
     *
     * returns device info
     *
     * out: NewManufacturerName (string)
     * out: NewManufacturerOUI (string)
     * out: NewModelName (string)
     * out: NewDescription (string)
     * out: NewProductClass (string)
     * out: NewSerialNumber (string)
     * out: NewSoftwareVersion (string)
     * out: NewHardwareVersion (string)
     * out: NewSpecVersion (string)
     * out: NewProvisioningCode (string)
     * out: NewUpTime (ui4)
     * out: NewDeviceLog (string)
     *
     * @return array
     */
    public function getInfo()
    {
        $result = $this->client->GetInfo();
        if ($this->errorHandling($result, 'Could not get device info from FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setProvisioningCode
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewProvisioningCode (string)
     *
     * @param string $provisioningCode
     * @return void
     */
    public function setProvisioningCode($provisioningCode)
    {
        $result = $this->client->SetProvisioningCode(
            new \SoapParam($provisioningCode, 'NewProvisioningCode'));
        $this->errorHandling($result, 'Could not ... from/to FRITZ!Box');
    }

    /**
     * getDeviceLog
     *
     * returns device log entries
     *
     * out: NewDeviceLog (string)
     *
     * @return string
     */
    public function getDeviceLog()
    {
        $result = $this->client->GetDeviceLog();
        if ($this->errorHandling($result, 'Could not get device log from FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getSecurityPort
     *
     * returns security port adress
     *
     * out: NewSecurityPort (ui2)
     *
     * @return int
     */
    public function getSecurityPort()
    {
        $result = $this->client->GetSecurityPort();
        if ($this->errorHandling($result, 'Could not get security port adress from FRITZ!Box')) {
            return;
        }

        return $result;
    }
}
