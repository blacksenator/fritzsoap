<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides functions to read and manipulate
 * data via TR-064 interface on FRITZ!Box router from AVM.
 *
 * @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/x_homeauto.pdf
 *
 * +++++++++++++++++++++ ATTENTION +++++++++++++++++++++
 * THIS FILE IS AUTOMATIC ASSEMBLED BUT PARTLY REVIEWED!
 * ALL FUNCTIONS ARE FRAMEWORKS AND HAVE TO BE CORRECTLY
 * CODED, IF THEIR COMMENT WAS NOT OVERWRITTEN!
 * +++++++++++++++++++++++++++++++++++++++++++++++++++++
 *
 * @author Volker Püschel <knuffy@anasco.de>
 * @copyright Volker Püschel 2022
 * @license MIT
**/

use blacksenator\fritzsoap\fritzsoap;

class x_homeauto extends fritzsoap
{
    const
        SERVICE_TYPE = 'urn:dslforum-org:service:X_AVM-DE_Homeauto:1',
        CONTROL_URL  = '/upnp/control/x_homeauto';

    /**
     * getInfo
     *
     * returns setting rules
     *
     * out: NewAllowedCharsAIN (string)
     * out: NewMaxCharsAIN (ui2)
     * out: NewMinCharsAIN (ui2)
     * out: NewMaxCharsDeviceName (ui2)
     * out: NewMinCharsDeviceName (ui2)
     *
     * @return array
     */
    public function getInfo()
    {
        $result = $this->client->GetInfo();
        if ($this->errorHandling($result, 'Could not get homeauto info from FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getGenericDeviceInfos
     *
     * returns detailed info and state of home
     * automation devices. The Index starts with
     * >0<. An index greater than the number of
     * joint devices cause a 713 error.
     *
     * in: NewIndex (ui2)
     * out: NewAIN (string)
     * out: NewDeviceId (ui2)
     * out: NewFunctionBitMask (ui2)
     * out: NewFirmwareVersion (string)
     * out: NewManufacturer (string)
     * out: NewProductName (string)
     * out: NewDeviceName (string)
     * out: NewPresent (string)
     * out: NewMultimeterIsEnabled (string)
     * out: NewMultimeterIsValid (string)
     * out: NewMultimeterPower (ui4)
     * out: NewMultimeterEnergy (ui4)
     * out: NewTemperatureIsEnabled (string)
     * out: NewTemperatureIsValid (string)
     * out: NewTemperatureCelsius (i4)
     * out: NewTemperatureOffset (i4)
     * out: NewSwitchIsEnabled (string)
     * out: NewSwitchIsValid (string)
     * out: NewSwitchState (string)
     * out: NewSwitchMode (string)
     * out: NewSwitchLock (boolean)
     * out: NewHkrIsEnabled (string)
     * out: NewHkrIsValid (string)
     * out: NewHkrIsTemperature (i4)
     * out: NewHkrSetVentilStatus (string)
     * out: NewHkrSetTemperature (i4)
     * out: NewHkrReduceVentilStatus (string)
     * out: NewHkrReduceTemperature (i4)
     * out: NewHkrComfortVentilStatus (string)
     * out: NewHkrComfortTemperature (i4)
     *
     * @param int $index
     * @return array
     */
    public function getGenericDeviceInfos($index)
    {
        $result = $this->client->GetGenericDeviceInfos(
            new \SoapParam($index, 'NewIndex'));
        $message = sprintf('Could not get info of device #%s from/to FRITZ!Box', $index);
        if ($this->errorHandling($result, $message)) {
            return;
        }

        return $result;
    }

    /**
     * getSpecificDeviceInfos
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewAIN (string)
     * out: NewDeviceId (ui2)
     * out: NewFunctionBitMask (ui2)
     * out: NewFirmwareVersion (string)
     * out: NewManufacturer (string)
     * out: NewProductName (string)
     * out: NewDeviceName (string)
     * out: NewPresent (string)
     * out: NewMultimeterIsEnabled (string)
     * out: NewMultimeterIsValid (string)
     * out: NewMultimeterPower (ui4)
     * out: NewMultimeterEnergy (ui4)
     * out: NewTemperatureIsEnabled (string)
     * out: NewTemperatureIsValid (string)
     * out: NewTemperatureCelsius (i4)
     * out: NewTemperatureOffset (i4)
     * out: NewSwitchIsEnabled (string)
     * out: NewSwitchIsValid (string)
     * out: NewSwitchState (string)
     * out: NewSwitchMode (string)
     * out: NewSwitchLock (boolean)
     * out: NewHkrIsEnabled (string)
     * out: NewHkrIsValid (string)
     * out: NewHkrIsTemperature (i4)
     * out: NewHkrSetVentilStatus (string)
     * out: NewHkrSetTemperature (i4)
     * out: NewHkrReduceVentilStatus (string)
     * out: NewHkrReduceTemperature (i4)
     * out: NewHkrComfortVentilStatus (string)
     * out: NewHkrComfortTemperature (i4)
     *
     * @param string $aIN
     * @return array
     */
    public function getSpecificDeviceInfos($aIN)
    {
        $result = $this->client->GetSpecificDeviceInfos(
            new \SoapParam($aIN, 'NewAIN'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setDeviceName
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewAIN (string)
     * in: NewDeviceName (string)
     *
     * @param string $aIN
     * @param string $deviceName
     * @return void
     */
    public function setDeviceName($aIN, $deviceName)
    {
        $result = $this->client->SetDeviceName(
            new \SoapParam($aIN, 'NewAIN'),
            new \SoapParam($deviceName, 'NewDeviceName'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setSwitch
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewAIN (string)
     * in: NewSwitchState (string)
     *
     * @param string $aIN
     * @param string $switchState
     * @return void
     */
    public function setSwitch($aIN, $switchState)
    {
        $result = $this->client->SetSwitch(
            new \SoapParam($aIN, 'NewAIN'),
            new \SoapParam($switchState, 'NewSwitchState'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }
}
