<?php

namespace blacksenator\fritzsoap;

/**
* The class provides functions to read and manipulate
* data via TR-064 interface on FRITZ!Box router from AVM:
* according to:
* @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/x_appsetup.pdf
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
* @copyright Volker Püschel 2020
* @license MIT
**/

use blacksenator\fritzsoap\fritzsoap;

class x_appsetup extends fritzsoap
{
    /**
     * getInfo
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewMinCharsAppId
     * out: NewMaxCharsAppId
     * out: NewAllowedCharsAppId
     * out: NewMinCharsAppDisplayName
     * out: NewMaxCharsAppDisplayName
     * out: NewMinCharsAppUsername
     * out: NewMaxCharsAppUsername
     * out: NewAllowedCharsAppUsername
     * out: NewMinCharsAppPassword
     * out: NewMaxCharsAppPassword
     * out: NewAllowedCharsAppPassword
     * out: NewMinCharsIPSecIdentifier
     * out: NewMaxCharsIPSecIdentifier
     * out: NewAllowedCharsIPSecIdentifier
     * out: NewAllowedCharsCryptAlgos
     * out: NewAllowedCharsAppAVMAddress
     * out: NewMinCharsFilter
     * out: NewMaxCharsFilter
     * out: NewAllowedCharsFilter
     * out: NewMinCharsIPSecPreSharedKey
     * out: NewMaxCharsIPSecPreSharedKey
     * out: NewAllowedCharsIPSecPreSharedKey
     * out: NewMinCharsIPSecXauthUsername
     * out: NewMaxCharsIPSecXauthUsername
     * out: NewAllowedCharsIPSecXauthUsername
     * out: NewMinCharsIPSecXauthPassword
     * out: NewMaxCharsIPSecXauthPassword
     * out: NewAllowedCharsIPSecXauthPassword
     *
     */
    public function getInfo()
    {
        $result = $this->client->GetInfo();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * getConfig
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewConfigRight
     * out: NewAppRight
     * out: NewNasRight
     * out: NewPhoneRight
     * out: NewDialRight
     * out: NewHomeautoRight
     * out: NewInternetRights
     * out: NewAccessFromInternet
     *
     */
    public function getConfig()
    {
        $result = $this->client->GetConfig();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * getAppMessageFilter
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewAppId
     * out: NewFilterList
     *
     */
    public function getAppMessageFilter()
    {
        $result = $this->client->GetAppMessageFilter();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * registerApp
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewAppId
     * in: NewAppDisplayName
     * in: NewAppDeviceMAC
     * in: NewAppUsername
     * in: NewAppPassword
     * in: NewAppRight
     * in: NewNasRight
     * in: NewPhoneRight
     * in: NewHomeautoRight
     * in: NewAppInternetRights
     *
     */
    public function registerApp()
    {
        $result = $this->client->RegisterApp();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * setAppVPN
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewAppId
     * in: NewIPSecIdentifier
     * in: NewIPSecPreSharedKey
     * in: NewIPSecXauthUsername
     * in: NewIPSecXauthPassword
     *
     */
    public function setAppVPN()
    {
        $result = $this->client->SetAppVPN();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * setAppVPNwithPFS
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewAppId
     * in: NewIPSecIdentifier
     * in: NewIPSecPreSharedKey
     * in: NewIPSecXauthUsername
     * in: NewIPSecXauthPassword
     *
     */
    public function setAppVPNwithPFS()
    {
        $result = $this->client->SetAppVPNwithPFS();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * setAppMessageFilter
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewAppId
     * in: NewType
     * in: NewFilter
     *
     */
    public function setAppMessageFilter()
    {
        $result = $this->client->SetAppMessageFilter();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * setAppMessageReceiver
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewAppId
     * in: NewCryptAlgos
     * in: NewAppAVMAddress
     * in: NewAppAVMPasswordHash
     * out: EncryptionSecret
     * out: BoxSenderId
     *
     */
    public function setAppMessageReceiver()
    {
        $result = $this->client->SetAppMessageReceiver();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * resetEvent
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewEventId
     *
     */
    public function resetEvent()
    {
        $result = $this->client->ResetEvent();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * getAppRemoteInfo
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewSubnetMask
     * out: NewIPAddress
     * out: NewExternalIPAddress
     * out: NewExternalIPv6Address
     * out: NewRemoteAccessDDNSEnabled
     * out: NewRemoteAccessDDNSDomain
     * out: NewMyFritzEnabled
     * out: NewMyFritzDynDNSName
     *
     */
    public function getAppRemoteInfo()
    {
        $result = $this->client->GetAppRemoteInfo();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

}
