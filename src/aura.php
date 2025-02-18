<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides functions to read and manipulate data via SOAP interface
 * on FRITZ!Box router from AVM.
 *
 * There is no official AVM documentation about AURA (AVM USB Remote Access)
 * available!
 *
 * @see: docs\auraSCPD.pdf
 *
 * To use this class, the USB-Fernanschluss (USB remote connection function must
 * be activated in the FRITZ!Box!
 *
 * @author Volker Püschel <knuffy@anasco.de>
 * @copyright Volker Püschel 2019 - 2025
 * @license MIT
**/

use blacksenator\fritzsoap\fritzsoap;

class aura extends fritzsoap
{
    const
        SERVICE_TYPE = 'urn:schemas-any-com:service:aura:1',
        CONTROL_URL  = '/upnp/control/aura';

    /**
     * getVersion
     *
     * returns version information
     *
     * out: NewServerVersion (string)
     * out: NewProtocolVersion (string)
     *
     * @return array
     */
    public function getVersion()
    {
        $result = $this->client->GetVersion();
        if ($this->errorHandling($result, 'Could not get AURA version from FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getListInfo
     *
     * returns number of conected USB remote devices
     *
     * out: NewNumber (ui2)
     *
     * @return int
     */
    public function getListInfo()
    {
        $result = $this->client->GetListInfo();
        if ($this->errorHandling($result, 'Could not get list info from FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getDeviceByIndex
     *
     * returns info about USB remote device. Index starts with >0<. An index
     * greater than the number of connected decvices cause a 713 error.
     *
     * in: NewIndex (ui2)
     * out: NewDeviceHandle (ui2)
     * out: NewName (string)
     * out: NewHardwareId (string)
     * out: NewSerialNumber (string)
     * out: NewTopologyId (ui4)
     * out: NewClass (ui1)
     * out: NewManufacturer (string)
     * out: NewStatus (ui2)
     * out: NewClientIP (string)
     *
     * @param int $index
     * @return array
     */
    public function getDeviceByIndex($index)
    {
        $result = $this->client->GetDeviceByIndex(
            new \SoapParam($index, 'NewIndex'));
        $message = sprintf('Could not get USB device info #%s from FRITZ!Box', $index);
        if ($this->errorHandling($result, $message)) {
            return;
        }

        return $result;
    }

    /**
     * getDeviceByHandle
     *
     * in: NewDeviceHandle (ui2)
     * out: NewName (string)
     * out: NewHardwareId (string)
     * out: NewSerialNumber (string)
     * out: NewTopologyId (ui4)
     * out: NewClass (ui1)
     * out: NewManufacturer (string)
     * out: NewStatus (ui2)
     * out: NewClientIP (string)
     *
     * @param int $deviceHandle
     * @return array
     */
    public function getDeviceByHandle($deviceHandle)
    {
        $result = $this->client->GetDeviceByHandle(
            new \SoapParam($deviceHandle, 'NewDeviceHandle'));
        $message = sprintf('Could not get device by handle %s from FRITZ!Box', $deviceHandle);
        if ($this->errorHandling($result, $message)) {
            return;
        }

        return $result;
    }

    /**
     * connectDevice
     *
     * in: NewDeviceHandle (ui2)
     *
     * @param int $deviceHandle
     * @return void
     */
    public function connectDevice($deviceHandle)
    {
        $result = $this->client->ConnectDevice(
            new \SoapParam($deviceHandle, 'NewDeviceHandle'));
        $message = sprintf('Could not connect device by handle %s at FRITZ!Box', $deviceHandle);
        $this->errorHandling($result, $message);
    }

    /**
     * disconnectDevice
     *
     * in: NewDeviceHandle (ui2)
     *
     * @param int $deviceHandle
     * @return void
     */
    public function disconnectDevice($deviceHandle)
    {
        $result = $this->client->DisconnectDevice(
            new \SoapParam($deviceHandle, 'NewDeviceHandle'));
        $message = sprintf('Could not disconnect device by handle %s at FRITZ!Box', $deviceHandle);
        $this->errorHandling($result, $message);
    }
}
