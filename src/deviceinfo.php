<?php

namespace blacksenator\fritzsoap;

/**
* The class provides functions to read and manipulate
* data via TR-064 interface on FRITZ!Box router from AVM:
* according to:
* @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/deviceinfoSCPD.pdf
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

class deviceinfo extends fritzsoap
{
    /**
     * getInfo
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewManufacturerName
     * out: NewManufacturerOUI
     * out: NewModelName
     * out: NewDescription
     * out: NewProductClass
     * out: NewSerialNumber
     * out: NewSoftwareVersion
     * out: NewHardwareVersion
     * out: NewSpecVersion
     * out: NewProvisioningCode
     * out: NewUpTime
     * out: NewDeviceLog
     *
     */
    public function getInfo()
    {
        $result = $this->client->GetInfo();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * setProvisioningCode
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewProvisioningCode
     *
     */
    public function setProvisioningCode()
    {
        $result = $this->client->SetProvisioningCode();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * getDeviceLog
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewDeviceLog
     *
     */
    public function getDeviceLog()
    {
        $result = $this->client->GetDeviceLog();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * getSecurityPort
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewSecurityPort
     *
     */
    public function getSecurityPort()
    {
        $result = $this->client->GetSecurityPort();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

}
