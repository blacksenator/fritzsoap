<?php

namespace blacksenator\fritzsoap;

/**
* The class provides functions to read and manipulate
* data via TR-064 interface on FRITZ!Box router from AVM:
* according to:
* @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/userifSCPD.pdf
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

class userif extends fritzsoap
{
    /**
     * getInfo
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewUpgradeAvailable
     * out: NewPasswordRequired
     * out: NewPasswordUserSelectable
     * out: NewWarrantyDate
     * out: NewX_AVM-DE_Version
     * out: NewX_AVM-DE_DownloadURL
     * out: NewX_AVM-DE_InfoURL
     * out: NewX_AVM-DE_UpdateState
     * out: NewX_AVM-DE_LaborVersion
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
     * x_AVM_DE_CheckUpdate
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewX_AVM-DE_LaborVersion
     *
     */
    public function x_AVM_DE_CheckUpdate()
    {
        $result = $this->client->{'X_AVM-DE_CheckUpdate'}();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_DoUpdate
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewUpgradeAvailable
     * out: NewX_AVM-DE_UpdateState
     *
     */
    public function x_AVM_DE_DoUpdate()
    {
        $result = $this->client->{'X_AVM-DE_DoUpdate'}();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_DoPrepareCGI
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewX_AVM-DE_CGI
     * out: NewX_AVM-DE_SessionID
     *
     */
    public function x_AVM_DE_DoPrepareCGI()
    {
        $result = $this->client->{'X_AVM-DE_DoPrepareCGI'}();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_DoManualUpdate
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewX_AVM-DE_AllowDowngrade
     * in: NewX_AVM-DE_DownloadURL
     *
     */
    public function x_AVM_DE_DoManualUpdate()
    {
        $result = $this->client->{'X_AVM-DE_DoManualUpdate'}();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetInternationalConfig
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewX_AVM-DE_Language
     * out: NewX_AVM-DE_Country
     * out: NewX_AVM-DE_Annex
     * out: NewX_AVM-DE_LanguageList
     * out: NewX_AVM-DE_CountryList
     * out: NewX_AVM-DE_AnnexList
     *
     */
    public function x_AVM_DE_GetInternationalConfig()
    {
        $result = $this->client->{'X_AVM-DE_GetInternationalConfig'}();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_SetInternationalConfig
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewX_AVM-DE_Language
     * in: NewX_AVM-DE_Country
     * in: NewX_AVM-DE_Annex
     *
     */
    public function x_AVM_DE_SetInternationalConfig()
    {
        $result = $this->client->{'X_AVM-DE_SetInternationalConfig'}();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetInfo
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewX_AVM-DE_AutoUpdateMode
     * out: NewX_AVM-DE_UpdateTime
     * out: NewX_AVM-DE_LastFwVersion
     * out: NewX_AVM-DE_LastInfoUrl
     * out: NewX_AVM-DE_CurrentFwVersion
     * out: NewX_AVM-DE_UpdateSuccessful
     *
     */
    public function x_AVM_DE_GetInfo()
    {
        $result = $this->client->{'X_AVM-DE_GetInfo'}();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_SetConfig
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewX_AVM-DE_AutoUpdateMode
     *
     */
    public function x_AVM_DE_SetConfig()
    {
        $result = $this->client->{'X_AVM-DE_SetConfig'}();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

}
