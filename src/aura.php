<?php

namespace blacksenator\fritzsoap;

/**
* The class provides functions to read and manipulate
* data via TR-064 interface on FRITZ!Box router from AVM.
*
* There is no official AVM documentation about AURA
* (AVM USB Remote Access) available!
*
* @see: https://avm.de/service/schnittstellen/
*
* To use this class, the USB-Fernanschluss (USB remote
* connection function must be activated in the FRITZ!Box!
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
* @author Volker Püschel <knuffy@anasco.de>
* @copyright Volker Püschel 2021
* @license MIT
**/

use blacksenator\fritzsoap\fritzsoap;

class aura extends fritzsoap
{
    /**
     * getVersion
     *
     * out: NewServerVersion
     * out: NewProtocolVersion
     *
     * @return array
     */
    public function getVersion()
    {
        $result = $this->client->GetVersion();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getListInfo
     *
     * out: NewNumber
     *
     * @return string
     */
    public function getListInfo()
    {
        $result = $this->client->GetListInfo();
        if ($this->errorHandling($result, 'Could not get list of USB devices from FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getDeviceByIndex
     *
     * in: NewIndex
     * out: NewDeviceHandle
     * out: NewName
     * out: NewHardwareId
     * out: NewSerialNumber
     * out: NewTopologyId
     * out: NewClass
     * out: NewManufacturer
     * out: NewStatus
     * out: NewClientIP
     *
     * @param int $newIndex
     * @return array
     */
    public function getDeviceByIndex(int $newIndex = 0)
    {
        $result = $this->client->GetDeviceByIndex(new \SoapParam($newIndex, 'NewIndex'));
        if ($this->errorHandling($result, sprintf("Could not get info about USB device %s", $newIndex))) {
            return;
        }

        return $result;
    }

    /**
     * getDeviceByHandle
     *
     * in: NewDeviceHandle
     * out: NewName
     * out: NewHardwareId
     * out: NewSerialNumber
     * out: NewTopologyId
     * out: NewClass
     * out: NewManufacturer
     * out: NewStatus
     * out: NewClientIP
     *
     * @param string $newDeviceHandle
     * @return array
     */
    public function getDeviceByHandle(string $newDeviceHandle)
    {
        $result = $this->client->GetDeviceByHandle(new \SoapParam($newDeviceHandle, 'NewDeviceHandle'));
        if ($this->errorHandling($result, sprintf("Could not get info about USB device %s", $newDeviceHandle))) {
            return;
        }

        return $result;
    }

    /**
     * connectDevice
     *
     * in: NewDeviceHandle
     *
     * @param string $newDeviceHandle
     * @return void
     */
    public function connectDevice(string $newDeviceHandle)
    {
        $result = $this->client->ConnectDevice(new \SoapParam($newDeviceHandle, 'NewDeviceHandle'));
        $this->errorHandling($result, sprintf("Could not connect USB device %s to FRITZ!Box", $newDeviceHandle));
    }

    /**
     * disconnectDevice
     *
     * in: NewDeviceHandle
     *
     * @param string $newDeviceHandle
     * @return void
     */
    public function disconnectDevice(string $newDeviceHandle)
    {
        $result = $this->client->DisconnectDevice(new \SoapParam($newDeviceHandle, 'NewDeviceHandle'));
        $this->errorHandling($result, sprintf("Could not disconnect USB device %s to FRITZ!Box", $newDeviceHandle));
    }
}
