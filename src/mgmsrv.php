<?php

namespace blacksenator\fritzsoap;

/**
* The class provides functions to read and manipulate
* data via TR-064 interface on FRITZ!Box router from AVM:
* according to:
* @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/mgmsrvSCPD.pdf
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

class mgmsrv extends fritzsoap
{
    /**
     * getInfo
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewURL
     * out: NewUsername
     * out: NewPeriodicInformEnable
     * out: NewPeriodicInformInterval
     * out: NewPeriodicInformTime
     * out: NewParameterKey
     * out: NewParameterHash
     * out: NewConnectionRequestURL
     * out: NewConnectionRequestUsername
     * out: NewUpgradesManaged
     *
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
     * setManagementServerURL
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewURL
     *
     */
    public function setManagementServerURL()
    {
        $result = $this->client->SetManagementServerURL();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setManagementServerUsername
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewUsername
     *
     */
    public function setManagementServerUsername()
    {
        $result = $this->client->SetManagementServerUsername();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setManagementServerPassword
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewPassword
     *
     */
    public function setManagementServerPassword()
    {
        $result = $this->client->SetManagementServerPassword();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setPeriodicInform
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewPeriodicInformEnable
     * in: NewPeriodicInformInterval
     * in: NewPeriodicInformTime
     *
     */
    public function setPeriodicInform()
    {
        $result = $this->client->SetPeriodicInform();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setConnectionRequestAuthentication
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewConnectionRequestUsername
     * in: NewConnectionRequestPassword
     *
     */
    public function setConnectionRequestAuthentication()
    {
        $result = $this->client->SetConnectionRequestAuthentication();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setUpgradeManagement
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewUpgradesManaged
     *
     */
    public function setUpgradeManagement()
    {
        $result = $this->client->SetUpgradeManagement();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_SetTR069Enable
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewTR069Enabled
     *
     */
    public function x_SetTR069Enable()
    {
        $result = $this->client->X_SetTR069Enable();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetTR069FirmwareDownloadEnabled
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewTR069FirmwareDownloadEnabled
     *
     */
    public function x_AVM_DE_GetTR069FirmwareDownloadEnabled()
    {
        $result = $this->client->{'X_AVM-DE_GetTR069FirmwareDownloadEnabled'}();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_SetTR069FirmwareDownloadEnabled
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewTR069FirmwareDownloadEnabled
     *
     */
    public function x_AVM_DE_SetTR069FirmwareDownloadEnabled()
    {
        $result = $this->client->{'X_AVM-DE_SetTR069FirmwareDownloadEnabled'}();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

}
