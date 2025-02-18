<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides functions to read and manipulate data via SOAP interface
 * on FRITZ!Box router from AVM:
 *
 * @see https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/deviceconfigSCPD.pdf
 *
 * @author Volker Püschel <knuffy@anasco.de>
 * @copyright Volker Püschel 2019 - 2025
 * @license MIT
**/

use blacksenator\fritzsoap\fritzsoap;

class deviceconfig extends fritzsoap
{
    const
        SERVICE_TYPE = 'urn:dslforum-org:service:DeviceConfig:1',
        CONTROL_URL  = '/upnp/control/deviceconfig';

    /**
     * getPersistentData
     *
     * out: NewPersistentData (string)
     *
     * @return string
     */
    public function getPersistentData()
    {
        $result = $this->client->GetPersistentData();
        if ($this->errorHandling($result, 'Could not get persistent data from FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setPersistentData
     *
     * in: NewPersistentData (string)
     *
     * @param string $persistentData
     * @return void
     */
    public function setPersistentData($persistentData)
    {
        $result = $this->client->SetPersistentData(
            new \SoapParam($persistentData, 'NewPersistentData'));
        $this->errorHandling($result, 'Could not set persistent data at FRITZ!Box');
    }

    /**
     * configurationStarted
     *
     * in: NewSessionID (string)
     *
     * @param string $sessionID
     * @return void
     */
    public function configurationStarted($sessionID)
    {
        $result = $this->client->ConfigurationStarted(
            new \SoapParam($sessionID, 'NewSessionID'));
        $this->errorHandling($result, 'Could not start configuration at FRITZ!Box');
    }

    /**
     * configurationFinished
     *
     * out: NewStatus (string)
     *
     * @return string
     */
    public function configurationFinished()
    {
        $result = $this->client->ConfigurationFinished();
        if ($this->errorHandling($result, 'Could not finish configuration at FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * factoryReset
     *
     * @return void
     */
    public function factoryReset()
    {
        $result = $this->client->FactoryReset();
        $this->errorHandling($result, 'Could not set factor reset of FRITZ!Box');
    }

    /**
     * reboot
     *
     * @return void
     */
    public function reboot()
    {
        $result = $this->client->Reboot();
        $this->errorHandling($result, 'Could not reboot FRITZ!Box');
    }

    /**
     * x_GenerateUUID
     *
     * out: NewUUID (uuid)
     *
     * @return string
     */
    public function x_GenerateUUID()
    {
        $result = $this->client->X_GenerateUUID();
        if ($this->errorHandling($result, 'Could not generate UUID at FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetConfigFile
     *
     * Returns a URL where a file encrypted with the transmitted password is
     * made available for download. The URL is secured by SSL (https://) using
     * the TR-064 SSL certificate. The URL is secured by Digest authorization
     * using the currently active username and password of the TR-064 service
     * and is only valid for less than 30 seconds!
     *
     * in: NewX_AVM-DE_Password (string)
     * out: NewX_AVM-DE_ConfigFileUrl (string)
     *
     * @param string $x_AVM_DE_Password
     * @return string
     */
    public function x_AVM_DE_GetConfigFile($x_AVM_DE_Password)
    {
        $result = $this->client->{'X_AVM-DE_GetConfigFile'}(
            new \SoapParam($x_AVM_DE_Password, 'NewX_AVM-DE_Password'));
        if ($this->errorHandling($result, 'Could not get config file from FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_SetConfigFile
     *
     * in: NewX_AVM-DE_Password (string)
     * in: NewX_AVM-DE_ConfigFileUrl (string)
     *
     * @param string $x_AVM_DE_Password
     * @param string $x_AVM_DE_ConfigFileUrl
     * @return void
     */
    public function x_AVM_DE_SetConfigFile($x_AVM_DE_Password, $x_AVM_DE_ConfigFileUrl)
    {
        $result = $this->client->{'X_AVM-DE_SetConfigFile'}(
            new \SoapParam($x_AVM_DE_Password, 'NewX_AVM-DE_Password'),
            new \SoapParam($x_AVM_DE_ConfigFileUrl, 'NewX_AVM-DE_ConfigFileUrl'));
        $this->errorHandling($result, 'Could not set config file on FRITZ!Box');
    }

    /**
     * x_AVM_DE_CreateUrlSID
     *
     * returns a string "sid=*"
     *
     * out: NewX_AVM-DE_UrlSID (string)
     *
     * @return string
     */
    public function x_AVM_DE_CreateUrlSID()
    {
        $result = $this->client->{'X_AVM-DE_CreateUrlSID'}();
        if ($this->errorHandling($result, 'Could not create URL SID at FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_SendSupportData
     *
     * in: NewX_AVM-DE_SupportDataMode (string)
     *
     * @param string $x_AVM_DE_SupportDataMode
     * @return void
     */
    public function x_AVM_DE_SendSupportData($x_AVM_DE_SupportDataMode)
    {
        $result = $this->client->{'X_AVM-DE_SendSupportData'}(
            new \SoapParam($x_AVM_DE_SupportDataMode, 'NewX_AVM-DE_SupportDataMode'));
        $this->errorHandling($result, 'Could not send support data from FRITZ!Box');
    }

    /**
     * x_AVM_DE_GetSupportDataInfo
     *
     * out: NewX_AVM-DE_SupportDataMode (string)
     * out: NewX_AVM-DE_SupportDataID (string)
     * out: NewX_AVM-DE_SupportDataTimestamp (dateTime)
     * out: NewX_AVM-DE_SupportDataStatus (string)
     *
     * @return array
     */
    public function x_AVM_DE_GetSupportDataInfo()
    {
        $result = $this->client->{'X_AVM-DE_GetSupportDataInfo'}();
        if ($this->errorHandling($result, 'Could not get support data from FRITZ!Box')) {
            return;
        }

        return $result;
    }
}
