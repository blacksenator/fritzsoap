<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides functions to read and manipulate data via SOAP interface
 * on FRITZ!Box router from AVM:
 *
 * @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/x_remoteSCPD.pdf
 *
 * @author Volker Püschel <knuffy@anasco.de>
 * @copyright Volker Püschel 2019 - 2025
 * @license MIT
**/

use blacksenator\fritzsoap\fritzsoap;

class x_remote extends fritzsoap
{
    const
        SERVICE_TYPE = 'urn:dslforum-org:service:X_AVM-DE_RemoteAccess:1',
        CONTROL_URL  = '/upnp/control/x_remote';

    /**
     * getInfo
     *
     * returns myFritz info
     *
     * out: NewEnabled (boolean)
     * out: NewPort (string)
     * out: NewUsername (string)
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
     * setConfig
     *
     * in: NewEnabled (boolean)
     * in: NewPort (string)
     * in: NewUsername (string)
     * in: NewPassword (string)
     *
     * @param bool $enabled
     * @param string $port
     * @param string $username
     * @param string $password
     * @return void
     */
    public function setConfig($enabled, $port, $username, $password)
    {
        $result = $this->client->SetConfig(
            new \SoapParam($enabled, 'NewEnabled'),
            new \SoapParam($port, 'NewPort'),
            new \SoapParam($username, 'NewUsername'),
            new \SoapParam($password, 'NewPassword'));
        $this->errorHandling($result, 'Could not set config on FRITZ!Box');
    }

    /**
     * setEnable
     *
     * in: NewEnabled (boolean)
     * out: NewPort (string)
     *
     * @param bool $enabled
     * @return string
     */
    public function setEnable($enabled)
    {
        $result = $this->client->SetEnable(
            new \SoapParam($enabled, 'NewEnabled'));
        $state = $this->boolToState($enabled);
        $message = sprintf('Could not %s port at FRITZ!Box', $state);
        if ($this->errorHandling($result, $message)) {
            return;
        }

        return $result;
    }

    /**
     * getDDNSInfo
     *
     * returns DynDNS info
     *
     * out: NewEnabled (boolean)
     * out: NewProviderName (string)
     * out: NewUpdateURL (string)
     * out: NewDomain (string)
     * out: NewStatusIPv4 (string)
     * out: NewStatusIPv6 (string)
     * out: NewUsername (string)
     * out: NewMode (string)
     * out: NewServerIPv4 (string)
     * out: NewServerIPv6 (string)
     *
     * @return array
     */
    public function getDDNSInfo()
    {
        $result = $this->client->GetDDNSInfo();
        if ($this->errorHandling($result, 'Could not get DynDNS info from FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getDDNSProviders
     *
     * returns the list of DynDNS providers as XML:
     * <List>
     *     <Item>
     *         <ProviderName/>
     *         <InfoURL/>
     *     </Item>
     * </List>
     *
     * out: NewProviderList (string)
     *
     * @return string
     */
    public function getDDNSProviders()
    {
        $result = $this->client->GetDDNSProviders();
        if ($this->errorHandling($result, 'Could not get DynDNS providers from FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setDDNSConfig
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewEnabled (boolean)
     * in: NewProviderName (string)
     * in: NewUpdateURL (string)
     * in: NewDomain (string)
     * in: NewUsername (string)
     * in: NewMode (string)
     * in: NewServerIPv4 (string)
     * in: NewServerIPv6 (string)
     * in: NewPassword (string)
     *
     * @param bool $enabled
     * @param string $providerName
     * @param string $updateURL
     * @param string $domain
     * @param string $username
     * @param string $mode
     * @param string $serverIPv4
     * @param string $serverIPv6
     * @param string $password
     * @return void
     */
    public function setDDNSConfig($enabled, $providerName, $updateURL, $domain, $username, $mode, $serverIPv4, $serverIPv6, $password)
    {
        $result = $this->client->SetDDNSConfig(
            new \SoapParam($enabled, 'NewEnabled'),
            new \SoapParam($providerName, 'NewProviderName'),
            new \SoapParam($updateURL, 'NewUpdateURL'),
            new \SoapParam($domain, 'NewDomain'),
            new \SoapParam($username, 'NewUsername'),
            new \SoapParam($mode, 'NewMode'),
            new \SoapParam($serverIPv4, 'NewServerIPv4'),
            new \SoapParam($serverIPv6, 'NewServerIPv6'),
            new \SoapParam($password, 'NewPassword'));
        $state = $this->boolToState($enabled);
        $message = sprintf('Could not %s DDNS config at FRITZ!Box', $state);
        $this->errorHandling($result, $message);
    }
}
