<?php

namespace blacksenator\fritzsoap;

/**
* The class provides functions to read and manipulate
* data via TR-064 interface on FRITZ!Box router from AVM:
* according to:
* @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/x_remoteSCPD.pdf
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

class x_remote extends fritzsoap
{
    /**
     * getInfo
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewEnabled
     * out: NewPort
     * out: NewUsername
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
     * setConfig
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewEnabled
     * in: NewPort
     * in: NewUsername
     * in: NewPassword
     *
     */
    public function setConfig()
    {
        $result = $this->client->SetConfig();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setEnable
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewEnabled
     * out: NewPort
     *
     */
    public function setEnable()
    {
        $result = $this->client->SetEnable();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getDDNSInfo
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewEnabled
     * out: NewProviderName
     * out: NewUpdateURL
     * out: NewDomain
     * out: NewStatusIPv4
     * out: NewStatusIPv6
     * out: NewUsername
     * out: NewMode
     * out: NewServerIPv4
     * out: NewServerIPv6
     *
     */
    public function getDDNSInfo()
    {
        $result = $this->client->GetDDNSInfo();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getDDNSProviders
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewProviderList
     *
     */
    public function getDDNSProviders()
    {
        $result = $this->client->GetDDNSProviders();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setDDNSConfig
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewEnabled
     * in: NewProviderName
     * in: NewUpdateURL
     * in: NewDomain
     * in: NewUsername
     * in: NewMode
     * in: NewServerIPv4
     * in: NewServerIPv6
     * in: NewPassword
     *
     */
    public function setDDNSConfig()
    {
        $result = $this->client->SetDDNSConfig();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

}
