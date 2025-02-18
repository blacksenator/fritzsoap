<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides functions to read and manipulate data via SOAP interface
 * on FRITZ!Box router from AVM:
 *
 * @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/userifSCPD.pdf
 *
 * @author Volker Püschel <knuffy@anasco.de>
 * @copyright Volker Püschel 2019 - 2025
 * @license MIT
**/

use blacksenator\fritzsoap\fritzsoap;

class userif extends fritzsoap
{
    const
        SERVICE_TYPE = 'urn:dslforum-org:service:UserInterface:1',
        CONTROL_URL  = '/upnp/control/userif';

    /**
     * getInfo
     *
     * returns info about user interface
     *
     * out: NewUpgradeAvailable (boolean)
     * out: NewPasswordRequired (boolean)
     * out: NewPasswordUserSelectable (boolean)
     * out: NewWarrantyDate (dateTime)
     * out: NewX_AVM-DE_Version (string)
     * out: NewX_AVM-DE_DownloadURL (string)
     * out: NewX_AVM-DE_InfoURL (string)
     * out: NewX_AVM-DE_UpdateState (string)
     * out: NewX_AVM-DE_LaborVersion (string)
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
     * x_AVM_DE_CheckUpdate
     *
     * in: NewX_AVM-DE_LaborVersion (string)
     *
     * @param string $x_AVM_DE_LaborVersion
     * @return void
     */
    public function x_AVM_DE_CheckUpdate($x_AVM_DE_LaborVersion)
    {
        $result = $this->client->{'X_AVM-DE_CheckUpdate'}(
            new \SoapParam($x_AVM_DE_LaborVersion, 'NewX_AVM-DE_LaborVersion'));
        $this->errorHandling($result, 'Could not check for labor version');
    }

    /**
     * x_AVM_DE_DoUpdate
     *
     * out: NewUpgradeAvailable (boolean)
     * out: NewX_AVM-DE_UpdateState (string)
     *
     * @return array
     */
    public function x_AVM_DE_DoUpdate()
    {
        $result = $this->client->{'X_AVM-DE_DoUpdate'}();
        if ($this->errorHandling($result, 'Could not update FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_DoPrepareCGI
     *
     * out: NewX_AVM-DE_CGI (string)
     * out: NewX_AVM-DE_SessionID (string)
     *
     * @return array
     */
    public function x_AVM_DE_DoPrepareCGI()
    {
        $result = $this->client->{'X_AVM-DE_DoPrepareCGI'}();
        if ($this->errorHandling($result, 'Could not prepare CGI at FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_DoManualUpdate
     *
     * in: NewX_AVM-DE_AllowDowngrade (boolean)
     * in: NewX_AVM-DE_DownloadURL (string)
     *
     * @param bool $x_AVM_DE_AllowDowngrade
     * @param string $x_AVM_DE_DownloadURL
     * @return void
     */
    public function x_AVM_DE_DoManualUpdate($x_AVM_DE_AllowDowngrade, $x_AVM_DE_DownloadURL)
    {
        $result = $this->client->{'X_AVM-DE_DoManualUpdate'}(
            new \SoapParam($x_AVM_DE_AllowDowngrade, 'NewX_AVM-DE_AllowDowngrade'),
            new \SoapParam($x_AVM_DE_DownloadURL, 'NewX_AVM-DE_DownloadURL'));
        $this->errorHandling($result, 'Could not manual update FRITZ!Box');
    }

    /**
     * x_AVM_DE_GetInternationalConfig
     *
     * returns internationalisation config data
     *
     * out: NewX_AVM-DE_Language (string)
     * out: NewX_AVM-DE_Country (string)
     * out: NewX_AVM-DE_Annex (string)
     * out: NewX_AVM-DE_LanguageList (string)
     * out: NewX_AVM-DE_CountryList (string)
     * out: NewX_AVM-DE_AnnexList (string)
     *
     * @return array
     */
    public function x_AVM_DE_GetInternationalConfig()
    {
        $result = $this->client->{'X_AVM-DE_GetInternationalConfig'}();
        if ($this->errorHandling($result, 'Could not get international config data from FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_SetInternationalConfig
     *
     * in: NewX_AVM-DE_Language (string)
     * in: NewX_AVM-DE_Country (string)
     * in: NewX_AVM-DE_Annex (string)
     *
     * @param string $x_AVM_DE_Language
     * @param string $x_AVM_DE_Country
     * @param string $x_AVM_DE_Annex
     * @return void
     */
    public function x_AVM_DE_SetInternationalConfig($x_AVM_DE_Language, $x_AVM_DE_Country, $x_AVM_DE_Annex)
    {
        $result = $this->client->{'X_AVM-DE_SetInternationalConfig'}(
            new \SoapParam($x_AVM_DE_Language, 'NewX_AVM-DE_Language'),
            new \SoapParam($x_AVM_DE_Country, 'NewX_AVM-DE_Country'),
            new \SoapParam($x_AVM_DE_Annex, 'NewX_AVM-DE_Annex'));
        $this->errorHandling($result, 'Could not set international config data from FRITZ!Box');
    }

    /**
     * x_AVM_DE_GetInfo
     *
     * returns update info
     *
     * out: NewX_AVM-DE_AutoUpdateMode (string)
     * out: NewX_AVM-DE_UpdateTime (dateTime)
     * out: NewX_AVM-DE_LastFwVersion (string)
     * out: NewX_AVM-DE_LastInfoUrl (string)
     * out: NewX_AVM-DE_CurrentFwVersion (string)
     * out: NewX_AVM-DE_UpdateSuccessful (string)
     *
     * @return array
     */
    public function x_AVM_DE_GetInfo()
    {
        $result = $this->client->{'X_AVM-DE_GetInfo'}();
        if ($this->errorHandling($result, 'Could not get update info from FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_SetConfig
     *
     * in: NewX_AVM-DE_AutoUpdateMode (string)
     *
     * @param string $x_AVM_DE_AutoUpdateMode
     * @return void
     */
    public function x_AVM_DE_SetConfig($x_AVM_DE_AutoUpdateMode)
    {
        $result = $this->client->{'X_AVM-DE_SetConfig'}(
            new \SoapParam($x_AVM_DE_AutoUpdateMode, 'NewX_AVM-DE_AutoUpdateMode'));
        $this->errorHandling($result, 'Could not set auto update mode on FRITZ!Box');
    }
}
