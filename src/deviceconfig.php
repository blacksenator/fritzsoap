<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides functions to read and manipulate
 * data via TR-064 interface on FRITZ!Box router from AVM:
 *
 * @see https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/deviceconfigSCPD.pdf
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

class deviceconfig extends fritzsoap
{
    const
        SERVICE_TYPE = 'urn:dslforum-org:service:DeviceConfig:1',
        CONTROL_URL  = '/upnp/control/deviceconfig';

    /**
     * getPersistentData
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewPersistentData (string)
     *
     * @return string
     */
    public function getPersistentData()
    {
        $result = $this->client->GetPersistentData();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setPersistentData
     *
     * automatically generated; complete coding if necessary!
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
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * configurationStarted
     *
     * automatically generated; complete coding if necessary!
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
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * configurationFinished
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewStatus (string)
     *
     * @return string
     */
    public function configurationFinished()
    {
        $result = $this->client->ConfigurationFinished();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * factoryReset
     *
     * automatically generated; complete coding if necessary!
     *
     * @return void
     */
    public function factoryReset()
    {
        $result = $this->client->FactoryReset();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * reboot
     *
     * automatically generated; complete coding if necessary!
     *
     * @return void
     */
    public function reboot()
    {
        $result = $this->client->Reboot();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_GenerateUUID
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewUUID (uuid)
     *
     * @return string
     */
    public function x_GenerateUUID()
    {
        $result = $this->client->X_GenerateUUID();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetConfigFile
     *
     * automatically generated; complete coding if necessary!
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
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_SetConfigFile
     *
     * automatically generated; complete coding if necessary!
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
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_CreateUrlSID
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewX_AVM-DE_UrlSID (string)
     *
     * @return string
     */
    public function x_AVM_DE_CreateUrlSID()
    {
        $result = $this->client->{'X_AVM-DE_CreateUrlSID'}();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_SendSupportData
     *
     * automatically generated; complete coding if necessary!
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
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetSupportDataInfo
     *
     * automatically generated; complete coding if necessary!
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
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

}
