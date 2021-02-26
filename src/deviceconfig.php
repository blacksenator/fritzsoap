<?php

namespace blacksenator\fritzsoap;

/**
* The class provides functions to read and manipulate
* data via TR-064 interface on FRITZ!Box router from AVM:
* according to:
* @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/deviceconfigSCPD.pdf
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
* @copyright Volker Püschel 2021
* @license MIT
**/

use blacksenator\fritzsoap\fritzsoap;

class deviceconfig extends fritzsoap
{
    /**
     * getPersistentData
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewPersistentData
     *
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
     * in: NewPersistentData
     *
     */
    public function setPersistentData()
    {
        $result = $this->client->SetPersistentData();
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
     * in: NewSessionID
     *
     */
    public function configurationStarted()
    {
        $result = $this->client->ConfigurationStarted();
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
     * out: NewStatus
     *
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
     *
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
     *
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
     * out: NewUUID
     *
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
     * in: NewX_AVM-DE_Password
     * out: NewX_AVM-DE_ConfigFileUrl
     *
     */
    public function x_AVM_DE_GetConfigFile()
    {
        $result = $this->client->{'X_AVM-DE_GetConfigFile'}();
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
     * in: NewX_AVM-DE_Password
     * in: NewX_AVM-DE_ConfigFileUrl
     *
     */
    public function x_AVM_DE_SetConfigFile()
    {
        $result = $this->client->{'X_AVM-DE_SetConfigFile'}();
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
     * out: NewX_AVM-DE_UrlSID
     *
     */
    public function x_AVM_DE_CreateUrlSID()
    {
        $result = $this->client->{'X_AVM-DE_CreateUrlSID'}();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

}
