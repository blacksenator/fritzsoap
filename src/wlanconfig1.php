<?php

namespace blacksenator\fritzsoap;

/**
* The class provides functions to read and manipulate
* data via TR-064 interface on FRITZ!Box router from AVM:
* according to:
* @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/wlanconfigSCPD.pdf
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

class wlanconfig1 extends fritzsoap
{
    /**
     * setEnable
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewEnable
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
     * getInfo
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewEnable
     * out: NewStatus
     * out: NewMaxBitRate
     * out: NewChannel
     * out: NewSSID
     * out: NewBeaconType
     * out: NewMACAddressControlEnabled
     * out: NewStandard
     * out: NewBSSID
     * out: NewBasicEncryptionModes
     * out: NewBasicAuthenticationMode
     * out: NewMaxCharsSSID
     * out: NewMinCharsSSID
     * out: NewAllowedCharsSSID
     * out: NewMinCharsPSK
     * out: NewMaxCharsPSK
     * out: NewAllowedCharsPSK
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
     * in: NewMaxBitRate
     * in: NewChannel
     * in: NewSSID
     * in: NewBeaconType
     * in: NewMACAddressControlEnabled
     * in: NewBasicEncryptionModes
     * in: NewBasicAuthenticationMode
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
     * setSecurityKeys
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewWEPKey0
     * in: NewWEPKey1
     * in: NewWEPKey2
     * in: NewWEPKey3
     * in: NewPreSharedKey
     * in: NewKeyPassphrase
     *
     */
    public function setSecurityKeys()
    {
        $result = $this->client->SetSecurityKeys();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getSecurityKeys
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewWEPKey0
     * out: NewWEPKey1
     * out: NewWEPKey2
     * out: NewWEPKey3
     * out: NewPreSharedKey
     * out: NewKeyPassphrase
     *
     */
    public function getSecurityKeys()
    {
        $result = $this->client->GetSecurityKeys();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setDefaultWEPKeyIndex
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewDefaultWEPKeyIndex
     *
     */
    public function setDefaultWEPKeyIndex()
    {
        $result = $this->client->SetDefaultWEPKeyIndex();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getDefaultWEPKeyIndex
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewDefaultWEPKeyIndex
     *
     */
    public function getDefaultWEPKeyIndex()
    {
        $result = $this->client->GetDefaultWEPKeyIndex();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setBasBeaconSecurityProperties
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewBasicEncryptionModes
     * in: NewBasicAuthenticationMode
     *
     */
    public function setBasBeaconSecurityProperties()
    {
        $result = $this->client->SetBasBeaconSecurityProperties();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getBasBeaconSecurityProperties
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewBasicEncryptionModes
     * out: NewBasicAuthenticationMode
     *
     */
    public function getBasBeaconSecurityProperties()
    {
        $result = $this->client->GetBasBeaconSecurityProperties();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getStatistics
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewTotalPacketsSent
     * out: NewTotalPacketsReceived
     *
     */
    public function getStatistics()
    {
        $result = $this->client->GetStatistics();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getPacketStatistics
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewTotalPacketsSent
     * out: NewTotalPacketsReceived
     *
     */
    public function getPacketStatistics()
    {
        $result = $this->client->GetPacketStatistics();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getBSSID
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewBSSID
     *
     */
    public function getBSSID()
    {
        $result = $this->client->GetBSSID();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getSSID
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewSSID
     *
     */
    public function getSSID()
    {
        $result = $this->client->GetSSID();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setSSID
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewSSID
     *
     */
    public function setSSID()
    {
        $result = $this->client->SetSSID();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getBeaconType
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewBeaconType
     *
     */
    public function getBeaconType()
    {
        $result = $this->client->GetBeaconType();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setBeaconType
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewBeaconType
     *
     */
    public function setBeaconType()
    {
        $result = $this->client->SetBeaconType();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getChannelInfo
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewChannel
     * out: NewPossibleChannels
     *
     */
    public function getChannelInfo()
    {
        $result = $this->client->GetChannelInfo();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setChannel
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewChannel
     *
     */
    public function setChannel()
    {
        $result = $this->client->SetChannel();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getBeaconAdvertisement
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewBeaconAdvertisementEnabled
     *
     */
    public function getBeaconAdvertisement()
    {
        $result = $this->client->GetBeaconAdvertisement();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setBeaconAdvertisement
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewBeaconAdvertisementEnabled
     *
     */
    public function setBeaconAdvertisement()
    {
        $result = $this->client->SetBeaconAdvertisement();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getTotalAssociations
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewTotalAssociations
     *
     */
    public function getTotalAssociations()
    {
        $result = $this->client->GetTotalAssociations();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getGenericAssociatedDeviceInfo
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewAssociatedDeviceIndex
     * out: NewAssociatedDeviceMACAddress
     * out: NewAssociatedDeviceIPAddress
     * out: NewAssociatedDeviceAuthState
     * out: NewX_AVM-DE_Speed
     * out: NewX_AVM-DE_SignalStrength
     *
     */
    public function getGenericAssociatedDeviceInfo()
    {
        $result = $this->client->GetGenericAssociatedDeviceInfo();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getSpecificAssociatedDeviceInfo
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewAssociatedDeviceMACAddress
     * out: NewAssociatedDeviceIPAddress
     * out: NewAssociatedDeviceAuthState
     * out: NewX_AVM-DE_Speed
     * out: NewX_AVM-DE_SignalStrength
     *
     */
    public function getSpecificAssociatedDeviceInfo()
    {
        $result = $this->client->GetSpecificAssociatedDeviceInfo();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetSpecificAssociatedDeviceInfoByIp
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewAssociatedDeviceIPAddress
     * out: NewAssociatedDeviceMACAddress
     * out: NewAssociatedDeviceAuthState
     * out: NewX_AVM-DE_Speed
     * out: NewX_AVM-DE_SignalStrength
     *
     */
    public function x_AVM_DE_GetSpecificAssociatedDeviceInfoByIp()
    {
        $result = $this->client->{'X_AVM-DE_GetSpecificAssociatedDeviceInfoByIp'}();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetWLANDeviceListPath
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewX_AVM-DE_WLANDeviceListPath
     *
     */
    public function x_AVM_DE_GetWLANDeviceListPath()
    {
        $result = $this->client->{'X_AVM-DE_GetWLANDeviceListPath'}();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_SetStickSurfEnable
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewStickSurfEnable
     *
     */
    public function x_AVM_DE_SetStickSurfEnable()
    {
        $result = $this->client->{'X_AVM-DE_SetStickSurfEnable'}();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetIPTVOptimized
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewX_AVM-DE_IPTVoptimize
     *
     */
    public function x_AVM_DE_GetIPTVOptimized()
    {
        $result = $this->client->{'X_AVM-DE_GetIPTVOptimized'}();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_SetIPTVOptimized
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewX_AVM-DE_IPTVoptimize
     *
     */
    public function x_AVM_DE_SetIPTVOptimized()
    {
        $result = $this->client->{'X_AVM-DE_SetIPTVOptimized'}();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetNightControl
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewNightControl
     * out: NewNightTimeControlNoForcedOff
     *
     */
    public function x_AVM_DE_GetNightControl()
    {
        $result = $this->client->{'X_AVM-DE_GetNightControl'}();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetWLANHybridMode
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewEnable
     * out: NewBeaconType
     * out: NewKeyPassphrase
     * out: NewSSID
     * out: NewBSSID
     * out: NewTrafficMode
     * out: NewManualSpeed
     * out: NewMaxSpeedDS
     * out: NewMaxSpeedUS
     *
     */
    public function x_AVM_DE_GetWLANHybridMode()
    {
        $result = $this->client->{'X_AVM-DE_GetWLANHybridMode'}();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_SetWLANHybridMode
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewEnable
     * in: NewBeaconType
     * in: NewKeyPassphrase
     * in: NewSSID
     * in: NewBSSID
     * in: NewTrafficMode
     * in: NewManualSpeed
     * in: NewMaxSpeedDS
     * in: NewMaxSpeedUS
     *
     */
    public function x_AVM_DE_SetWLANHybridMode()
    {
        $result = $this->client->{'X_AVM-DE_SetWLANHybridMode'}();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetWLANExtInfo
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewX_AVM-DE_APEnabled
     * out: NewX_AVM-DE_APType
     * out: NewX_AVM-DE_TimeoutActive
     * out: NewX_AVM-DE_Timeout
     * out: NewX_AVM-DE_TimeRemain
     * out: NewX_AVM-DE_NoForcedOff
     * out: NewX_AVM-DE_UserIsolation
     * out: NewX_AVM-DE_EncryptionMode
     * out: NewX_AVM-DE_LastChangedStamp
     *
     */
    public function x_AVM_DE_GetWLANExtInfo()
    {
        $result = $this->client->{'X_AVM-DE_GetWLANExtInfo'}();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetWPSInfo
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewX_AVM-DE_WPSMode
     * out: NewX_AVM-DE_WPSStatus
     *
     */
    public function x_AVM_DE_GetWPSInfo()
    {
        $result = $this->client->{'X_AVM-DE_GetWPSInfo'}();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_SetWPSConfig
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewX_AVM-DE_WPSMode
     * in: NewX_AVM-DE_WPSClientPIN
     * out: NewX_AVM-DE_WPSAPPIN
     * out: NewX_AVM-DE_WPSStatus
     *
     */
    public function x_AVM_DE_SetWPSConfig()
    {
        $result = $this->client->{'X_AVM-DE_SetWPSConfig'}();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_SetWLANGlobalEnable
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewX_AVM-DE_WLANGlobalEnable
     *
     */
    public function x_AVM_DE_SetWLANGlobalEnable()
    {
        $result = $this->client->{'X_AVM-DE_SetWLANGlobalEnable'}();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

}
