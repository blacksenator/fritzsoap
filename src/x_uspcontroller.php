<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides functions to read and manipulate data via SOAP interface
 * on FRITZ!Box router or repeater from AVM:
 *
 * @see https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/x_uspcontrollerSCPD.pdf
 *
 * @author Volker Püschel <knuffy@anasco.de>
 * @copyright Volker Püschel 2019 - 2025
 * @license MIT
**/

use blacksenator\fritzsoap\fritzsoap;

class x_uspcontroller extends fritzsoap
{
    const
        SERVICE_TYPE = 'urn:dslforum-org:service:X_AVM-DE_USPController:1',
        CONTROL_URL  = '/upnp/control/x_uspcontroller';

    /**
     * getInfo
     *
     * out: NewMinCharsEndpointID (ui2)
     * out: NewMaxCharsEndpointID (ui2)
     * out: NewAllowedCharsEndpointID (string)
     * out: NewMinCharsHostname (ui2)
     * out: NewMaxCharsHostname (ui2)
     * out: NewMinCharsPath (ui2)
     * out: NewMaxCharsPath (ui2)
     * out: NewMinCharsUsername (ui2)
     * out: NewMaxCharsUsername (ui2)
     * out: NewMinCharsPassword (ui2)
     * out: NewMaxCharsPassword (ui2)
     * out: NewUSPMyFRITZEnabled (boolean)
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
     * getUSPControllerByIndex
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewIndex (ui4)
     * out: NewEnable (boolean)
     * out: NewEndpointID (string)
     * out: NewMTP (string)
     * out: NewHostname (string)
     * out: NewPath (string)
     * out: NewPort (ui2)
     * out: NewUseTLS (boolean)
     * out: NewAccessRightSmarthome (boolean)
     * out: NewAccessRightMesh (boolean)
     * out: NewAccessRightInternet (boolean)
     * out: NewAccessRightSystem (boolean)
     * out: NewAccessRightController (boolean)
     * out: NewAccessRightWiFi (boolean)
     * out: NewAccessRightVoIP (boolean)
     * out: NewUsername (string)
     *
     * @param int $index
     * @return array
     */
    public function getUSPControllerByIndex($index)
    {
        $result = $this->client->GetUSPControllerByIndex(
            new \SoapParam($index, 'NewIndex'));
        $message = sprintf('Could not get USP controller with index %s from FRITZ!Box', $index);
        if ($this->errorHandling($result, $message)) {
            return;
        }

        return $result;
    }

    /**
     * getUSPControllerNumberOfEntries
     *
     * out: NewUSPControllerNumberOfEntries (ui4)
     *
     * @return int
     */
    public function getUSPControllerNumberOfEntries()
    {
        $result = $this->client->GetUSPControllerNumberOfEntries();
        if ($this->errorHandling($result, 'Could not get number of entries USP controller from FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * addUSPController
     *
     * in: NewEnable (boolean)
     * in: NewEndpointID (string)
     * in: NewMTP (string)
     * in: NewHostname (string)
     * in: NewPath (string)
     * in: NewPort (ui2)
     * in: NewUseTLS (boolean)
     * in: NewAccessRightSmarthome (boolean)
     * in: NewAccessRightMesh (boolean)
     * in: NewAccessRightInternet (boolean)
     * in: NewAccessRightSystem (boolean)
     * in: NewAccessRightController (boolean)
     * in: NewAccessRightWiFi (boolean)
     * in: NewAccessRightVoIP (boolean)
     * out: NewIndex (ui4)
     * in: NewUsername (string)
     * in: NewPassword (string)
     *
     * @param bool $enable
     * @param string $endpointID
     * @param string $mTP
     * @param string $hostname
     * @param string $path
     * @param int $port
     * @param bool $useTLS
     * @param bool $accessRightSmarthome
     * @param bool $accessRightMesh
     * @param bool $accessRightInternet
     * @param bool $accessRightSystem
     * @param bool $accessRightController
     * @param bool $accessRightWiFi
     * @param bool $accessRightVoIP
     * @param string $username
     * @param string $password
     * @return int
     */
    public function addUSPController($enable, $endpointID, $mTP, $hostname, $path, $port, $useTLS, $accessRightSmarthome, $accessRightMesh, $accessRightInternet, $accessRightSystem, $accessRightController, $accessRightWiFi, $accessRightVoIP, $username, $password)
    {
        $result = $this->client->AddUSPController(
            new \SoapParam($enable, 'NewEnable'),
            new \SoapParam($endpointID, 'NewEndpointID'),
            new \SoapParam($mTP, 'NewMTP'),
            new \SoapParam($hostname, 'NewHostname'),
            new \SoapParam($path, 'NewPath'),
            new \SoapParam($port, 'NewPort'),
            new \SoapParam($useTLS, 'NewUseTLS'),
            new \SoapParam($accessRightSmarthome, 'NewAccessRightSmarthome'),
            new \SoapParam($accessRightMesh, 'NewAccessRightMesh'),
            new \SoapParam($accessRightInternet, 'NewAccessRightInternet'),
            new \SoapParam($accessRightSystem, 'NewAccessRightSystem'),
            new \SoapParam($accessRightController, 'NewAccessRightController'),
            new \SoapParam($accessRightWiFi, 'NewAccessRightWiFi'),
            new \SoapParam($accessRightVoIP, 'NewAccessRightVoIP'),
            new \SoapParam($username, 'NewUsername'),
            new \SoapParam($password, 'NewPassword'));
        $state = $this->boolToState($enable);
        $message = sprintf('Could not %s add USP controller %s at FRITZ!Box', $state, $endpointID);
        if ($this->errorHandling($result, $message)) {
            return;
        }

        return $result;
    }

    /**
     * deleteUSPControllerByIndex
     *
     * in: NewIndex (ui4)
     *
     * @param int $index
     * @return void
     */
    public function deleteUSPControllerByIndex($index)
    {
        $result = $this->client->DeleteUSPControllerByIndex(
            new \SoapParam($index, 'NewIndex'));
        $message = sprintf('Could not delete USP controller %s at FRITZ!Box', $index);
        $this->errorHandling($result, $message);
    }

    /**
     * setUSPControllerEnableByIndex
     *
     * in: NewIndex (ui4)
     * in: NewEnable (boolean)
     *
     * @param int $index
     * @param bool $enable
     * @return void
     */
    public function setUSPControllerEnableByIndex($index, $enable)
    {
        $result = $this->client->SetUSPControllerEnableByIndex(
            new \SoapParam($index, 'NewIndex'),
            new \SoapParam($enable, 'NewEnable'));
        $state = $this->boolToState($enable);
        $message = sprintf('Could not %s USP controller with index %s at FRITZ!Box', $state, $index);
        $this->errorHandling($result, $message);
    }

    /**
     * getUSPMyFRITZEnable
     *
     * out: NewUSPMyFRITZEnabled (boolean)
     *
     * @return bool
     */
    public function getUSPMyFRITZEnable()
    {
        $result = $this->client->GetUSPMyFRITZEnable();
        if ($this->errorHandling($result, 'Could not get USP myFritz status from FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setUSPMyFRITZEnable
     *
     * in: NewUSPMyFRITZEnabled (boolean)
     *
     * @param bool $uSPMyFRITZEnabled
     * @return void
     */
    public function setUSPMyFRITZEnable($uSPMyFRITZEnabled)
    {
        $result = $this->client->SetUSPMyFRITZEnable(
            new \SoapParam($uSPMyFRITZEnabled, 'NewUSPMyFRITZEnabled'));
        $state = $this->boolToState($uSPMyFRITZEnabled);
        $message = sprintf('Could not %s USP myFRITZ at FRITZ!Box', $state);
        $this->errorHandling($result, $message);
    }
}
