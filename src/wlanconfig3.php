<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides functions to read and manipulate data via SOAP interface
 * on FRITZ!Box router from AVM.
 *
 * @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/wlanconfigSCPD.pdf
 *
 * +++++++++++++++++++++ ATTENTION +++++++++++++++++++++
 * THIS FILE IS AUTOMATIC ASSEMBLED!
 * ALL FUNCTIONS ARE FRAMEWORKS AND HAVE TO BE CORRECTLY
 * CODED, IF THEIR COMMENT WAS NOT OVERWRITTEN!
 * +++++++++++++++++++++++++++++++++++++++++++++++++++++
 *
 * @author Volker Püschel <knuffy@anasco.de>
 * @copyright Volker Püschel 2019 - 2025
 * @license MIT
**/

use blacksenator\fritzsoap\fritzsoap;

class wlanconfig3 extends fritzsoap
{
    const
        SERVICE_TYPE = 'urn:dslforum-org:service:WLANConfiguration:3',
        CONTROL_URL  = '/upnp/control/wlanconfig3';

    /**
     * setEnable
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewEnable (boolean)
     *
     * @param bool $enable
     * @return void
     */
    public function setEnable($enable)
    {
        $result = $this->client->SetEnable(
            new \SoapParam($enable, 'NewEnable'));
        $this->errorHandling($result, 'Could not ... from/to FRITZ!Box');
    }

    /**
     * getInfo
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewEnable (boolean)
     * out: NewStatus (string)
     * out: NewMaxBitRate (string)
     * out: NewChannel (ui1)
     * out: NewSSID (string)
     * out: NewBeaconType (string)
     * out: NewX_AVM-DE_PossibleBeaconTypes (string)
     * out: NewMACAddressControlEnabled (boolean)
     * out: NewStandard (string)
     * out: NewBSSID (string)
     * out: NewBasicEncryptionModes (string)
     * out: NewBasicAuthenticationMode (string)
     * out: NewMaxCharsSSID (ui1)
     * out: NewMinCharsSSID (ui1)
     * out: NewAllowedCharsSSID (string)
     * out: NewMinCharsPSK (ui1)
     * out: NewMaxCharsPSK (ui1)
     * out: NewAllowedCharsPSK (string)
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
     * setConfig
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewMaxBitRate (string)
     * in: NewChannel (ui1)
     * in: NewSSID (string)
     * in: NewBeaconType (string)
     * in: NewMACAddressControlEnabled (boolean)
     * in: NewBasicEncryptionModes (string)
     * in: NewBasicAuthenticationMode (string)
     *
     * @param string $maxBitRate
     * @param int $channel
     * @param string $sSID
     * @param string $beaconType
     * @param bool $mACAddressControlEnabled
     * @param string $basicEncryptionModes
     * @param string $basicAuthenticationMode
     * @return void
     */
    public function setConfig($maxBitRate, $channel, $sSID, $beaconType, $mACAddressControlEnabled, $basicEncryptionModes, $basicAuthenticationMode)
    {
        $result = $this->client->SetConfig(
            new \SoapParam($maxBitRate, 'NewMaxBitRate'),
            new \SoapParam($channel, 'NewChannel'),
            new \SoapParam($sSID, 'NewSSID'),
            new \SoapParam($beaconType, 'NewBeaconType'),
            new \SoapParam($mACAddressControlEnabled, 'NewMACAddressControlEnabled'),
            new \SoapParam($basicEncryptionModes, 'NewBasicEncryptionModes'),
            new \SoapParam($basicAuthenticationMode, 'NewBasicAuthenticationMode'));
        $this->errorHandling($result, 'Could not ... from/to FRITZ!Box');
    }

    /**
     * setSecurityKeys
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewWEPKey0 (string)
     * in: NewWEPKey1 (string)
     * in: NewWEPKey2 (string)
     * in: NewWEPKey3 (string)
     * in: NewPreSharedKey (string)
     * in: NewKeyPassphrase (string)
     *
     * @param string $wEPKey0
     * @param string $wEPKey1
     * @param string $wEPKey2
     * @param string $wEPKey3
     * @param string $preSharedKey
     * @param string $keyPassphrase
     * @return void
     */
    public function setSecurityKeys($wEPKey0, $wEPKey1, $wEPKey2, $wEPKey3, $preSharedKey, $keyPassphrase)
    {
        $result = $this->client->SetSecurityKeys(
            new \SoapParam($wEPKey0, 'NewWEPKey0'),
            new \SoapParam($wEPKey1, 'NewWEPKey1'),
            new \SoapParam($wEPKey2, 'NewWEPKey2'),
            new \SoapParam($wEPKey3, 'NewWEPKey3'),
            new \SoapParam($preSharedKey, 'NewPreSharedKey'),
            new \SoapParam($keyPassphrase, 'NewKeyPassphrase'));
        $this->errorHandling($result, 'Could not ... from/to FRITZ!Box');
    }

    /**
     * getSecurityKeys
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewWEPKey0 (string)
     * out: NewWEPKey1 (string)
     * out: NewWEPKey2 (string)
     * out: NewWEPKey3 (string)
     * out: NewPreSharedKey (string)
     * out: NewKeyPassphrase (string)
     *
     * @return array
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
     * in: NewDefaultWEPKeyIndex (ui1)
     *
     * @param int $defaultWEPKeyIndex
     * @return void
     */
    public function setDefaultWEPKeyIndex($defaultWEPKeyIndex)
    {
        $result = $this->client->SetDefaultWEPKeyIndex(
            new \SoapParam($defaultWEPKeyIndex, 'NewDefaultWEPKeyIndex'));
        $this->errorHandling($result, 'Could not ... from/to FRITZ!Box');
    }

    /**
     * getDefaultWEPKeyIndex
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewDefaultWEPKeyIndex (ui1)
     *
     * @return int
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
     * in: NewBasicEncryptionModes (string)
     * in: NewBasicAuthenticationMode (string)
     *
     * @param string $basicEncryptionModes
     * @param string $basicAuthenticationMode
     * @return void
     */
    public function setBasBeaconSecurityProperties($basicEncryptionModes, $basicAuthenticationMode)
    {
        $result = $this->client->SetBasBeaconSecurityProperties(
            new \SoapParam($basicEncryptionModes, 'NewBasicEncryptionModes'),
            new \SoapParam($basicAuthenticationMode, 'NewBasicAuthenticationMode'));
        $this->errorHandling($result, 'Could not ... from/to FRITZ!Box');
    }

    /**
     * getBasBeaconSecurityProperties
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewBasicEncryptionModes (string)
     * out: NewBasicAuthenticationMode (string)
     *
     * @return array
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
     * out: NewTotalPacketsSent (ui4)
     * out: NewTotalPacketsReceived (ui4)
     *
     * @return array
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
     * out: NewTotalPacketsSent (ui4)
     * out: NewTotalPacketsReceived (ui4)
     *
     * @return array
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
     * out: NewBSSID (string)
     *
     * @return string
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
     * out: NewSSID (string)
     *
     * @return string
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
     * in: NewSSID (string)
     *
     * @param string $sSID
     * @return void
     */
    public function setSSID($sSID)
    {
        $result = $this->client->SetSSID(
            new \SoapParam($sSID, 'NewSSID'));
        $this->errorHandling($result, 'Could not ... from/to FRITZ!Box');
    }

    /**
     * getBeaconType
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewBeaconType (string)
     * out: NewX_AVM-DE_PossibleBeaconTypes (string)
     *
     * @return array
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
     * in: NewBeaconType (string)
     *
     * @param string $beaconType
     * @return void
     */
    public function setBeaconType($beaconType)
    {
        $result = $this->client->SetBeaconType(
            new \SoapParam($beaconType, 'NewBeaconType'));
        $this->errorHandling($result, 'Could not ... from/to FRITZ!Box');
    }

    /**
     * getChannelInfo
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewChannel (ui1)
     * out: NewPossibleChannels (string)
     *
     * @return array
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
     * in: NewChannel (ui1)
     *
     * @param int $channel
     * @return void
     */
    public function setChannel($channel)
    {
        $result = $this->client->SetChannel(
            new \SoapParam($channel, 'NewChannel'));
        $this->errorHandling($result, 'Could not ... from/to FRITZ!Box');
    }

    /**
     * getBeaconAdvertisement
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewBeaconAdvertisementEnabled (boolean)
     *
     * @return bool
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
     * in: NewBeaconAdvertisementEnabled (boolean)
     *
     * @param bool $beaconAdvertisementEnabled
     * @return void
     */
    public function setBeaconAdvertisement($beaconAdvertisementEnabled)
    {
        $result = $this->client->SetBeaconAdvertisement(
            new \SoapParam($beaconAdvertisementEnabled, 'NewBeaconAdvertisementEnabled'));
        $this->errorHandling($result, 'Could not ... from/to FRITZ!Box');
    }

    /**
     * getTotalAssociations
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewTotalAssociations (ui2)
     *
     * @return int
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
     * in: NewAssociatedDeviceIndex (ui2)
     * out: NewAssociatedDeviceMACAddress (string)
     * out: NewAssociatedDeviceIPAddress (string)
     * out: NewAssociatedDeviceAuthState (boolean)
     * out: NewX_AVM-DE_Speed (ui2)
     * out: NewX_AVM-DE_SignalStrength (ui1)
     *
     * @param int $associatedDeviceIndex
     * @return array
     */
    public function getGenericAssociatedDeviceInfo($associatedDeviceIndex)
    {
        $result = $this->client->GetGenericAssociatedDeviceInfo(
            new \SoapParam($associatedDeviceIndex, 'NewAssociatedDeviceIndex'));
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
     * in: NewAssociatedDeviceMACAddress (string)
     * out: NewAssociatedDeviceIPAddress (string)
     * out: NewAssociatedDeviceAuthState (boolean)
     * out: NewX_AVM-DE_Speed (ui2)
     * out: NewX_AVM-DE_SignalStrength (ui1)
     *
     * @param string $associatedDeviceMACAddress
     * @return array
     */
    public function getSpecificAssociatedDeviceInfo($associatedDeviceMACAddress)
    {
        $result = $this->client->GetSpecificAssociatedDeviceInfo(
            new \SoapParam($associatedDeviceMACAddress, 'NewAssociatedDeviceMACAddress'));
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
     * in: NewAssociatedDeviceIPAddress (string)
     * out: NewAssociatedDeviceMACAddress (string)
     * out: NewAssociatedDeviceAuthState (boolean)
     * out: NewX_AVM-DE_Speed (ui2)
     * out: NewX_AVM-DE_SignalStrength (ui1)
     *
     * @param string $associatedDeviceIPAddress
     * @return array
     */
    public function x_AVM_DE_GetSpecificAssociatedDeviceInfoByIp($associatedDeviceIPAddress)
    {
        $result = $this->client->{'X_AVM-DE_GetSpecificAssociatedDeviceInfoByIp'}(
            new \SoapParam($associatedDeviceIPAddress, 'NewAssociatedDeviceIPAddress'));
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
     * out: NewX_AVM-DE_WLANDeviceListPath (string)
     *
     * @return string
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
     * in: NewStickSurfEnable (boolean)
     *
     * @param bool $stickSurfEnable
     * @return void
     */
    public function x_AVM_DE_SetStickSurfEnable($stickSurfEnable)
    {
        $result = $this->client->{'X_AVM-DE_SetStickSurfEnable'}(
            new \SoapParam($stickSurfEnable, 'NewStickSurfEnable'));
        $this->errorHandling($result, 'Could not ... from/to FRITZ!Box');
    }

    /**
     * x_AVM_DE_GetIPTVOptimized
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewX_AVM-DE_IPTVoptimize (boolean)
     *
     * @return bool
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
     * in: NewX_AVM-DE_IPTVoptimize (boolean)
     *
     * @param bool $x_AVM_DE_IPTVoptimize
     * @return void
     */
    public function x_AVM_DE_SetIPTVOptimized($x_AVM_DE_IPTVoptimize)
    {
        $result = $this->client->{'X_AVM-DE_SetIPTVOptimized'}(
            new \SoapParam($x_AVM_DE_IPTVoptimize, 'NewX_AVM-DE_IPTVoptimize'));
        $this->errorHandling($result, 'Could not ... from/to FRITZ!Box');
    }

    /**
     * x_AVM_DE_GetNightControl
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewNightControl (string)
     * out: NewNightTimeControlNoForcedOff (boolean)
     *
     * @return array
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
     * out: NewEnable (boolean)
     * out: NewBeaconType (string)
     * out: NewKeyPassphrase (string)
     * out: NewSSID (string)
     * out: NewBSSID (string)
     * out: NewTrafficMode (string)
     * out: NewManualSpeed (boolean)
     * out: NewMaxSpeedDS (ui4)
     * out: NewMaxSpeedUS (ui4)
     *
     * @return array
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
     * in: NewEnable (boolean)
     * in: NewBeaconType (string)
     * in: NewKeyPassphrase (string)
     * in: NewSSID (string)
     * in: NewBSSID (string)
     * in: NewTrafficMode (string)
     * in: NewManualSpeed (boolean)
     * in: NewMaxSpeedDS (ui4)
     * in: NewMaxSpeedUS (ui4)
     *
     * @param bool $enable
     * @param string $beaconType
     * @param string $keyPassphrase
     * @param string $sSID
     * @param string $bSSID
     * @param string $trafficMode
     * @param bool $manualSpeed
     * @param int $maxSpeedDS
     * @param int $maxSpeedUS
     * @return void
     */
    public function x_AVM_DE_SetWLANHybridMode($enable, $beaconType, $keyPassphrase, $sSID, $bSSID, $trafficMode, $manualSpeed, $maxSpeedDS, $maxSpeedUS)
    {
        $result = $this->client->{'X_AVM-DE_SetWLANHybridMode'}(
            new \SoapParam($enable, 'NewEnable'),
            new \SoapParam($beaconType, 'NewBeaconType'),
            new \SoapParam($keyPassphrase, 'NewKeyPassphrase'),
            new \SoapParam($sSID, 'NewSSID'),
            new \SoapParam($bSSID, 'NewBSSID'),
            new \SoapParam($trafficMode, 'NewTrafficMode'),
            new \SoapParam($manualSpeed, 'NewManualSpeed'),
            new \SoapParam($maxSpeedDS, 'NewMaxSpeedDS'),
            new \SoapParam($maxSpeedUS, 'NewMaxSpeedUS'));
        $this->errorHandling($result, 'Could not ... from/to FRITZ!Box');
    }

    /**
     * x_AVM_DE_GetWLANExtInfo
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewX_AVM-DE_APEnabled (string)
     * out: NewX_AVM-DE_APType (string)
     * out: NewX_AVM-DE_TimeoutActive (string)
     * out: NewX_AVM-DE_Timeout (string)
     * out: NewX_AVM-DE_TimeRemain (string)
     * out: NewX_AVM-DE_NoForcedOff (string)
     * out: NewX_AVM-DE_UserIsolation (string)
     * out: NewX_AVM-DE_EncryptionMode (string)
     * out: NewX_AVM-DE_LastChangedStamp (ui4)
     *
     * @return array
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
     * out: NewX_AVM-DE_WPSMode (string)
     * out: NewX_AVM-DE_WPSStatus (string)
     *
     * @return array
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
     * in: NewX_AVM-DE_WPSMode (string)
     * out: NewX_AVM-DE_WPSStatus (string)
     *
     * @param string $x_AVM_DE_WPSMode
     * @return string
     */
    public function x_AVM_DE_SetWPSConfig($x_AVM_DE_WPSMode)
    {
        $result = $this->client->{'X_AVM-DE_SetWPSConfig'}(
            new \SoapParam($x_AVM_DE_WPSMode, 'NewX_AVM-DE_WPSMode'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_SetWPSEnable
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewX_AVM-DE_WPSEnable (boolean)
     *
     * @param bool $x_AVM_DE_WPSEnable
     * @return void
     */
    public function x_AVM_DE_SetWPSEnable($x_AVM_DE_WPSEnable)
    {
        $result = $this->client->{'X_AVM-DE_SetWPSEnable'}(
            new \SoapParam($x_AVM_DE_WPSEnable, 'NewX_AVM-DE_WPSEnable'));
        $this->errorHandling($result, 'Could not ... from/to FRITZ!Box');
    }

    /**
     * x_AVM_DE_SetWLANGlobalEnable
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewX_AVM-DE_WLANGlobalEnable (boolean)
     *
     * @param bool $x_AVM_DE_WLANGlobalEnable
     * @return void
     */
    public function x_AVM_DE_SetWLANGlobalEnable($x_AVM_DE_WLANGlobalEnable)
    {
        $result = $this->client->{'X_AVM-DE_SetWLANGlobalEnable'}(
            new \SoapParam($x_AVM_DE_WLANGlobalEnable, 'NewX_AVM-DE_WLANGlobalEnable'));
        $this->errorHandling($result, 'Could not ... from/to FRITZ!Box');
    }

    /**
     * x_AVM_DE_GetWLANConnectionInfo
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewAssociatedDeviceMACAddress (string)
     * out: NewSSID (string)
     * out: NewBSSID (string)
     * out: NewBeaconType (string)
     * out: NewChannel (ui1)
     * out: NewStandard (string)
     * out: NewX_AVM-DE_SignalStrength (ui1)
     * out: NewX_AVM-DE_Speed (ui2)
     * out: NewX_AVM-DE_SpeedRX (ui4)
     * out: NewX_AVM-DE_SpeedMax (ui4)
     * out: NewX_AVM-DE_SpeedRXMax (ui4)
     *
     * @return array
     */
    public function x_AVM_DE_GetWLANConnectionInfo()
    {
        $result = $this->client->{'X_AVM-DE_GetWLANConnectionInfo'}();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }
}
