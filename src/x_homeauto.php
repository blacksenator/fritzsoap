<?php

namespace blacksenator\fritzsoap;

/**
* The class provides functions to read and manipulate
* data via TR-064 interface on FRITZ!Box router from AVM:
* according to:
* @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/x_homeauto.pdf
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

class x_homeauto extends fritzsoap
{
    /**
     * getInfo
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewAllowedCharsAIN
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
     * getGenericDeviceInfos
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewIndex
     * out: NewAIN
     * out: NewDeviceId
     * out: NewFunctionBitMask
     * out: NewFirmwareVersion
     * out: NewManufacturer
     * out: NewProductName
     * out: NewDeviceName
     * out: NewPresent
     * out: NewMultimeterIsEnabled
     * out: NewMultimeterIsValid
     * out: NewMultimeterPower
     * out: NewMultimeterEnergy
     * out: NewTemperatureIsEnabled
     * out: NewTemperatureIsValid
     * out: NewTemperatureCelsius
     * out: NewTemperatureOffset
     * out: NewSwitchIsEnabled
     * out: NewSwitchIsValid
     * out: NewSwitchState
     * out: NewSwitchMode
     * out: NewSwitchLock
     * out: NewHkrIsEnabled
     * out: NewHkrIsValid
     * out: NewHkrIsTemperature
     * out: NewHkrSetVentilStatus
     * out: NewHkrSetTemperature
     * out: NewHkrReduceVentilStatus
     * out: NewHkrReduceTemperature
     * out: NewHkrComfortVentilStatus
     * out: NewHkrComfortTemperature
     *
     */
    public function getGenericDeviceInfos()
    {
        $result = $this->client->GetGenericDeviceInfos();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getSpecificDeviceInfos
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewAIN
     * out: NewDeviceId
     * out: NewFunctionBitMask
     * out: NewFirmwareVersion
     * out: NewManufacturer
     * out: NewProductName
     * out: NewDeviceName
     * out: NewPresent
     * out: NewMultimeterIsEnabled
     * out: NewMultimeterIsValid
     * out: NewMultimeterPower
     * out: NewMultimeterEnergy
     * out: NewTemperatureIsEnabled
     * out: NewTemperatureIsValid
     * out: NewTemperatureCelsius
     * out: NewTemperatureOffset
     * out: NewSwitchIsEnabled
     * out: NewSwitchIsValid
     * out: NewSwitchState
     * out: NewSwitchMode
     * out: NewSwitchLock
     * out: NewHkrIsEnabled
     * out: NewHkrIsValid
     * out: NewHkrIsTemperature
     * out: NewHkrSetVentilStatus
     * out: NewHkrSetTemperature
     * out: NewHkrReduceVentilStatus
     * out: NewHkrReduceTemperature
     * out: NewHkrComfortVentilStatus
     * out: NewHkrComfortTemperature
     *
     */
    public function getSpecificDeviceInfos()
    {
        $result = $this->client->GetSpecificDeviceInfos();
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
     * in: NewAIN
     * in: NewSwitchState
     *
     */
    public function setSwitch()
    {
        $result = $this->client->SetSwitch();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

}
