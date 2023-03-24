<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides functions to read and manipulate data via TR-064 interface
 * on FRITZ!Box router or repeater from AVM:
 *
 * @see https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/x_uspcontrollerSCPD.pdf
 *
 * +++++++++++++++++++++ ATTENTION +++++++++++++++++++++
 * THIS FILE IS AUTOMATIC ASSEMBLED!
 * ALL FUNCTIONS ARE FRAMEWORKS AND HAVE TO BE CORRECTLY
 * CODED, IF THEIR COMMENT WAS NOT OVERWRITTEN!
 * +++++++++++++++++++++++++++++++++++++++++++++++++++++
 *
 * @author Volker Püschel <knuffy@anasco.de>
 * @copyright Volker Püschel 2019 - 2023
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
     * automatically generated; complete coding if necessary!
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
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
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
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getUSPControllerNumberOfEntries
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewUSPControllerNumberOfEntries (ui4)
     *
     * @return int
     */
    public function getUSPControllerNumberOfEntries()
    {
        $result = $this->client->GetUSPControllerNumberOfEntries();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * addUSPController
     *
     * automatically generated; complete coding if necessary!
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
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * deleteUSPControllerByIndex
     *
     * automatically generated; complete coding if necessary!
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
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setUSPControllerEnableByIndex
     *
     * automatically generated; complete coding if necessary!
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
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getUSPMyFRITZEnable
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewUSPMyFRITZEnabled (boolean)
     *
     * @return bool
     */
    public function getUSPMyFRITZEnable()
    {
        $result = $this->client->GetUSPMyFRITZEnable();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setUSPMyFRITZEnable
     *
     * automatically generated; complete coding if necessary!
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
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }
}
