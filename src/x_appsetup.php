<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides functions to read and manipulate
 * data via TR-064 interface on FRITZ!Box router from AVM.
 *
 * @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/x_appsetup.pdf
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

class x_appsetup extends fritzsoap
{
    const
        SERVICE_TYPE = 'urn:dslforum-org:service:X_AVM-DE_AppSetup:1',
        CONTROL_URL  = '/upnp/control/x_appsetup';

    /**
     * getInfo
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewMinCharsAppId (ui2)
     * out: NewMaxCharsAppId (ui2)
     * out: NewAllowedCharsAppId (string)
     * out: NewMinCharsAppDisplayName (ui2)
     * out: NewMaxCharsAppDisplayName (ui2)
     * out: NewMinCharsAppUsername (ui2)
     * out: NewMaxCharsAppUsername (ui2)
     * out: NewAllowedCharsAppUsername (string)
     * out: NewMinCharsAppPassword (ui2)
     * out: NewMaxCharsAppPassword (ui2)
     * out: NewAllowedCharsAppPassword (string)
     * out: NewMinCharsIPSecIdentifier (ui2)
     * out: NewMaxCharsIPSecIdentifier (ui2)
     * out: NewAllowedCharsIPSecIdentifier (string)
     * out: NewAllowedCharsCryptAlgos (string)
     * out: NewAllowedCharsAppAVMAddress (string)
     * out: NewMinCharsFilter (ui2)
     * out: NewMaxCharsFilter (ui2)
     * out: NewAllowedCharsFilter (string)
     * out: NewMinCharsIPSecPreSharedKey (ui2)
     * out: NewMaxCharsIPSecPreSharedKey (ui2)
     * out: NewAllowedCharsIPSecPreSharedKey (string)
     * out: NewMinCharsIPSecXauthUsername (ui2)
     * out: NewMaxCharsIPSecXauthUsername (ui2)
     * out: NewAllowedCharsIPSecXauthUsername (string)
     * out: NewMinCharsIPSecXauthPassword (ui2)
     * out: NewMaxCharsIPSecXauthPassword (ui2)
     * out: NewAllowedCharsIPSecXauthPassword (string)
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
     * getConfig
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewConfigRight (string)
     * out: NewAppRight (string)
     * out: NewNasRight (string)
     * out: NewPhoneRight (string)
     * out: NewDialRight (string)
     * out: NewHomeautoRight (string)
     * out: NewInternetRights (boolean)
     * out: NewAccessFromInternet (boolean)
     *
     * @return array
     */
    public function getConfig()
    {
        $result = $this->client->GetConfig();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getAppMessageFilter
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewAppId (string)
     * out: NewFilterList (string)
     *
     * @param string $appId
     * @return string
     */
    public function getAppMessageFilter($appId)
    {
        $result = $this->client->GetAppMessageFilter(
            new \SoapParam($appId, 'NewAppId'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * registerApp
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewAppId (string)
     * in: NewAppDisplayName (string)
     * in: NewAppDeviceMAC (string)
     * in: NewAppUsername (string)
     * in: NewAppPassword (string)
     * in: NewAppRight (string)
     * in: NewNasRight (string)
     * in: NewPhoneRight (string)
     * in: NewHomeautoRight (string)
     * in: NewAppInternetRights (boolean)
     *
     * @param string $appId
     * @param string $appDisplayName
     * @param string $appDeviceMAC
     * @param string $appUsername
     * @param string $appPassword
     * @param string $appRight
     * @param string $nasRight
     * @param string $phoneRight
     * @param string $homeautoRight
     * @param bool $appInternetRights
     * @return void
     */
    public function registerApp($appId, $appDisplayName, $appDeviceMAC, $appUsername, $appPassword, $appRight, $nasRight, $phoneRight, $homeautoRight, $appInternetRights)
    {
        $result = $this->client->RegisterApp(
            new \SoapParam($appId, 'NewAppId'),
            new \SoapParam($appDisplayName, 'NewAppDisplayName'),
            new \SoapParam($appDeviceMAC, 'NewAppDeviceMAC'),
            new \SoapParam($appUsername, 'NewAppUsername'),
            new \SoapParam($appPassword, 'NewAppPassword'),
            new \SoapParam($appRight, 'NewAppRight'),
            new \SoapParam($nasRight, 'NewNasRight'),
            new \SoapParam($phoneRight, 'NewPhoneRight'),
            new \SoapParam($homeautoRight, 'NewHomeautoRight'),
            new \SoapParam($appInternetRights, 'NewAppInternetRights'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setAppVPN
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewAppId (string)
     * in: NewIPSecIdentifier (string)
     * in: NewIPSecPreSharedKey (string)
     * in: NewIPSecXauthUsername (string)
     * in: NewIPSecXauthPassword (string)
     *
     * @param string $appId
     * @param string $iPSecIdentifier
     * @param string $iPSecPreSharedKey
     * @param string $iPSecXauthUsername
     * @param string $iPSecXauthPassword
     * @return void
     */
    public function setAppVPN($appId, $iPSecIdentifier, $iPSecPreSharedKey, $iPSecXauthUsername, $iPSecXauthPassword)
    {
        $result = $this->client->SetAppVPN(
            new \SoapParam($appId, 'NewAppId'),
            new \SoapParam($iPSecIdentifier, 'NewIPSecIdentifier'),
            new \SoapParam($iPSecPreSharedKey, 'NewIPSecPreSharedKey'),
            new \SoapParam($iPSecXauthUsername, 'NewIPSecXauthUsername'),
            new \SoapParam($iPSecXauthPassword, 'NewIPSecXauthPassword'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setAppVPNwithPFS
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewAppId (string)
     * in: NewIPSecIdentifier (string)
     * in: NewIPSecPreSharedKey (string)
     * in: NewIPSecXauthUsername (string)
     * in: NewIPSecXauthPassword (string)
     *
     * @param string $appId
     * @param string $iPSecIdentifier
     * @param string $iPSecPreSharedKey
     * @param string $iPSecXauthUsername
     * @param string $iPSecXauthPassword
     * @return void
     */
    public function setAppVPNwithPFS($appId, $iPSecIdentifier, $iPSecPreSharedKey, $iPSecXauthUsername, $iPSecXauthPassword)
    {
        $result = $this->client->SetAppVPNwithPFS(
            new \SoapParam($appId, 'NewAppId'),
            new \SoapParam($iPSecIdentifier, 'NewIPSecIdentifier'),
            new \SoapParam($iPSecPreSharedKey, 'NewIPSecPreSharedKey'),
            new \SoapParam($iPSecXauthUsername, 'NewIPSecXauthUsername'),
            new \SoapParam($iPSecXauthPassword, 'NewIPSecXauthPassword'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setAppMessageFilter
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewAppId (string)
     * in: NewType (string)
     * in: NewFilter (string)
     *
     * @param string $appId
     * @param string $type
     * @param string $filter
     * @return void
     */
    public function setAppMessageFilter($appId, $type, $filter)
    {
        $result = $this->client->SetAppMessageFilter(
            new \SoapParam($appId, 'NewAppId'),
            new \SoapParam($type, 'NewType'),
            new \SoapParam($filter, 'NewFilter'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setAppMessageReceiver
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewAppId (string)
     * in: NewCryptAlgos (string)
     * in: NewAppAVMAddress (string)
     * in: NewAppAVMPasswordHash (string)
     * out: EncryptionSecret (string)
     * out: BoxSenderId (string)
     *
     * @param string $appId
     * @param string $cryptAlgos
     * @param string $appAVMAddress
     * @param string $appAVMPasswordHash
     * @return array
     */
    public function setAppMessageReceiver($appId, $cryptAlgos, $appAVMAddress, $appAVMPasswordHash)
    {
        $result = $this->client->SetAppMessageReceiver(
            new \SoapParam($appId, 'NewAppId'),
            new \SoapParam($cryptAlgos, 'NewCryptAlgos'),
            new \SoapParam($appAVMAddress, 'NewAppAVMAddress'),
            new \SoapParam($appAVMPasswordHash, 'NewAppAVMPasswordHash'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * resetEvent
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewEventId (ui4)
     *
     * @param int $eventId
     * @return void
     */
    public function resetEvent($eventId)
    {
        $result = $this->client->ResetEvent(
            new \SoapParam($eventId, 'NewEventId'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getAppRemoteInfo
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewSubnetMask (string)
     * out: NewIPAddress (string)
     * out: NewExternalIPAddress (string)
     * out: NewExternalIPv6Address (string)
     * out: NewRemoteAccessDDNSEnabled (boolean)
     * out: NewRemoteAccessDDNSDomain (string)
     * out: NewMyFritzEnabled (boolean)
     * out: NewMyFritzDynDNSName (string)
     *
     * @return array
     */
    public function getAppRemoteInfo()
    {
        $result = $this->client->GetAppRemoteInfo();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

}
