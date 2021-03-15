<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides functions to read and manipulate
 * data via TR-064 interface on FRITZ!Box router from AVM:
 *
 * @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/mgmsrvSCPD.pdf
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

class mgmsrv extends fritzsoap
{
    const
        SERVICE_TYPE = 'urn:dslforum-org:service:ManagementServer:1',
        CONTROL_URL  = '/upnp/control/mgmsrv';

    /**
     * getInfo
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewURL (string)
     * out: NewUsername (string)
     * out: NewPeriodicInformEnable (boolean)
     * out: NewPeriodicInformInterval (ui4)
     * out: NewPeriodicInformTime (dateTime)
     * out: NewParameterKey (string)
     * out: NewParameterHash (string)
     * out: NewConnectionRequestURL (string)
     * out: NewConnectionRequestUsername (string)
     * out: NewUpgradesManaged (boolean)
     *
     * @return array
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
     * in: NewURL (string)
     *
     * @param string $uRL
     * @return void
     */
    public function setManagementServerURL($uRL)
    {
        $result = $this->client->SetManagementServerURL(
            new \SoapParam($uRL, 'NewURL'));
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
     * in: NewUsername (string)
     *
     * @param string $username
     * @return void
     */
    public function setManagementServerUsername($username)
    {
        $result = $this->client->SetManagementServerUsername(
            new \SoapParam($username, 'NewUsername'));
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
     * in: NewPassword (string)
     *
     * @param string $password
     * @return void
     */
    public function setManagementServerPassword($password)
    {
        $result = $this->client->SetManagementServerPassword(
            new \SoapParam($password, 'NewPassword'));
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
     * in: NewPeriodicInformEnable (boolean)
     * in: NewPeriodicInformInterval (ui4)
     * in: NewPeriodicInformTime (dateTime)
     *
     * @param bool $periodicInformEnable
     * @param int $periodicInformInterval
     * @param string $periodicInformTime
     * @return void
     */
    public function setPeriodicInform($periodicInformEnable, $periodicInformInterval, $periodicInformTime)
    {
        $result = $this->client->SetPeriodicInform(
            new \SoapParam($periodicInformEnable, 'NewPeriodicInformEnable'),
            new \SoapParam($periodicInformInterval, 'NewPeriodicInformInterval'),
            new \SoapParam($periodicInformTime, 'NewPeriodicInformTime'));
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
     * in: NewConnectionRequestUsername (string)
     * in: NewConnectionRequestPassword (string)
     *
     * @param string $connectionRequestUsername
     * @param string $connectionRequestPassword
     * @return void
     */
    public function setConnectionRequestAuthentication($connectionRequestUsername, $connectionRequestPassword)
    {
        $result = $this->client->SetConnectionRequestAuthentication(
            new \SoapParam($connectionRequestUsername, 'NewConnectionRequestUsername'),
            new \SoapParam($connectionRequestPassword, 'NewConnectionRequestPassword'));
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
     * in: NewUpgradesManaged (boolean)
     *
     * @param bool $upgradesManaged
     * @return void
     */
    public function setUpgradeManagement($upgradesManaged)
    {
        $result = $this->client->SetUpgradeManagement(
            new \SoapParam($upgradesManaged, 'NewUpgradesManaged'));
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
     * in: NewTR069Enabled (boolean)
     *
     * @param bool $tR069Enabled
     * @return void
     */
    public function x_SetTR069Enable($tR069Enabled)
    {
        $result = $this->client->X_SetTR069Enable(
            new \SoapParam($tR069Enabled, 'NewTR069Enabled'));
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
     * out: NewTR069FirmwareDownloadEnabled (boolean)
     *
     * @return bool
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
     * in: NewTR069FirmwareDownloadEnabled (boolean)
     *
     * @param bool $tR069FirmwareDownloadEnabled
     * @return void
     */
    public function x_AVM_DE_SetTR069FirmwareDownloadEnabled($tR069FirmwareDownloadEnabled)
    {
        $result = $this->client->{'X_AVM-DE_SetTR069FirmwareDownloadEnabled'}(
            new \SoapParam($tR069FirmwareDownloadEnabled, 'NewTR069FirmwareDownloadEnabled'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

}
