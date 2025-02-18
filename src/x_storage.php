<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides functions to read and manipulate data via SOAP interface
 * on FRITZ!Box router from AVM:
 *
 * @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/x_storageSCPD.pdf
 *
 * @author Volker Püschel <knuffy@anasco.de>
 * @copyright Volker Püschel 2019 - 2025
 * @license MIT
**/

use blacksenator\fritzsoap\fritzsoap;

class x_storage extends fritzsoap
{
    const
        SERVICE_TYPE = 'urn:dslforum-org:service:X_AVM-DE_Storage:1',
        CONTROL_URL  = '/upnp/control/x_storage';

    /**
     * getInfo
     *
     * Returns an array with info
     *
     * out: NewFTPEnable (boolean)
     * out: NewFTPStatus (string)
     * out: NewSMBEnable (boolean)
     * out: NewFTPWANEnable (boolean)
     * out: NewFTPWANSSLOnly (boolean)
     * out: NewFTPWANPort (ui2)
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
     * requestFTPServerWAN
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewFTPWANPort (ui2)
     * out: NewFTPWANLifetime (ui4)
     *
     * @return array
     */
    public function requestFTPServerWAN()
    {
        $result = $this->client->RequestFTPServerWAN();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setFTPServer
     *
     * in: NewFTPEnable (boolean)
     *
     * @param bool $fTPEnable
     * @return void
     */
    public function setFTPServer($fTPEnable)
    {
        $result = $this->client->SetFTPServer(
            new \SoapParam($fTPEnable, 'NewFTPEnable'));
        $state = $this->boolToState($fTPEnable);
        $message = sprintf('Could not %s FTP server at FRITZ!Box', $state);
        $this->errorHandling($result, $message);
    }

    /**
     * setFTPServerWAN
     *
     * in: NewFTPWANEnable (boolean)
     * in: NewFTPWANSSLOnly (boolean)
     *
     * @param bool $fTPWANEnable
     * @param bool $fTPWANSSLOnly
     * @return void
     */
    public function setFTPServerWAN($fTPWANEnable, $fTPWANSSLOnly)
    {
        $result = $this->client->SetFTPServerWAN(
            new \SoapParam($fTPWANEnable, 'NewFTPWANEnable'),
            new \SoapParam($fTPWANSSLOnly, 'NewFTPWANSSLOnly'));
            $state = $this->boolToState($fTPWANEnable);
            $message = sprintf('Could not %s FTP server WAN at FRITZ!Box', $state);
            $this->errorHandling($result, $message);
    }

    /**
     * setSMBServer
     *
     * in: NewSMBEnable (boolean)
     *
     * @param bool $sMBEnable
     * @return void
     */
    public function setSMBServer($sMBEnable)
    {
        $result = $this->client->SetSMBServer(
            new \SoapParam($sMBEnable, 'NewSMBEnable'));
        $state = $this->boolToState($sMBEnable);
        $message = sprintf('Could not %s SMB server at FRITZ!Box', $state);
        $this->errorHandling($result, $message);
    }

    /**
     * getUserInfo
     *
     * returns user info
     *
     * out: NewEnable (boolean)
     * out: NewUsername (string)
     * out: NewX_AVM-DE_NetworkAccessReadOnly (boolean)
     *
     * @return array
     */
    public function getUserInfo()
    {
        $result = $this->client->GetUserInfo();
        if ($this->errorHandling($result, 'Could not get user info from FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setUserConfig
     *
     * in: NewEnable (boolean)
     * in: NewPassword (string)
     * in: NewX_AVM-DE_NetworkAccessReadOnly (boolean)
     *
     * @param bool $enable
     * @param string $password
     * @param bool $x_AVM_DE_NetworkAccessReadOnly
     * @return void
     */
    public function setUserConfig($enable, $password, $x_AVM_DE_NetworkAccessReadOnly)
    {
        $result = $this->client->SetUserConfig(
            new \SoapParam($enable, 'NewEnable'),
            new \SoapParam($password, 'NewPassword'),
            new \SoapParam($x_AVM_DE_NetworkAccessReadOnly, 'NewX_AVM-DE_NetworkAccessReadOnly'));
        $this->errorHandling($result, 'Could not set user config on FRITZ!Box');
    }
}
