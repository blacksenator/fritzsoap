<?php

namespace blacksenator\fritzsoap;

/**
* The class provides functions to read and manipulate
* data via TR-064 interface on FRITZ!Box router from AVM:
* according to:
* @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/x_storageSCPD.pdf
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
* THIS FILE IS AUTOMATIC ASSEMBLED BUT PARTLY REVIEWED!
* ALL FUNCTIONS ARE FRAMEWORKS AND HAVE TO BE CORRECTLY
* CODED, IF THEIR COMMENT WAS NOT OVERWRITTEN!
* +++++++++++++++++++++++++++++++++++++++++++++++++++++
*
* @author Volker Püschel <knuffy@anasco.de>
* @copyright Volker Püschel 2020
* @license MIT
**/

use blacksenator\fritzsoap\fritzsoap;

class x_storage extends fritzsoap
{
    /**
     * getInfo
     *
     * out: NewFTPEnable
     * out: NewFTPStatus
     * out: NewSMBEnable
     * out: NewFTPWANEnable
     * out: NewFTPWANSSLOnly
     * out: NewFTPWANPort
     *
     * @return array
     */
    public function getInfo(): array
    {
        $result = $this->client->GetInfo();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not get info from FRITZ!Box", $this->errorCode, $this->errorText));
            return [];
        }

        return $result;
    }

    /**
     * requestFTPServerWAN
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewFTPWANPort
     * out: NewFTPWANLifetime
     *
     */
    public function requestFTPServerWAN()
    {
        $result = $this->client->RequestFTPServerWAN();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * setFTPServer
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewFTPEnable
     *
     */
    public function setFTPServer()
    {
        $result = $this->client->SetFTPServer();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * setFTPServerWAN
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewFTPWANEnable
     * in: NewFTPWANSSLOnly
     *
     */
    public function setFTPServerWAN()
    {
        $result = $this->client->SetFTPServerWAN();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * setSMBServer
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewSMBEnable
     *
     */
    public function setSMBServer()
    {
        $result = $this->client->SetSMBServer();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * getUserInfo
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewEnable
     * out: NewUsername
     * out: NewX_AVM-DE_NetworkAccessReadOnly
     *
     */
    public function getUserInfo()
    {
        $result = $this->client->GetUserInfo();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * setUserConfig
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewEnable
     * in: NewPassword
     * in: NewX_AVM-DE_NetworkAccessReadOnly
     *
     */
    public function setUserConfig()
    {
        $result = $this->client->SetUserConfig();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

}
