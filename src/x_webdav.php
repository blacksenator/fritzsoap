<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides functions to read and manipulate data via SOAP interface
 * on FRITZ!Box router from AVM
 *
 * @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/x_webdavSCPD.pdf
 *
 * @author Volker Püschel <knuffy@anasco.de>
 * @copyright Volker Püschel 2019 - 2025
 * @license MIT
**/

use blacksenator\fritzsoap\fritzsoap;

class x_webdav extends fritzsoap
{
    const
        SERVICE_TYPE = 'urn:dslforum-org:service:X_AVM-DE_WebDAVClient:1',
        CONTROL_URL  = '/upnp/control/x_webdav';

    /**
     * getInfo
     *
     * returns WebDAV info
     *
     * out: NewEnable (boolean)
     * out: NewHostURL (string)
     * out: NewUsername (string)
     * out: NewMountpointName (string)
     *
     * @return array
     */
    public function getInfo()
    {
        $result = $this->client->GetInfo();
        if ($this->errorHandling($result, 'Could not get WebDAV info from FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setConfig
     *
     * in: NewEnable (boolean)
     * in: NewHostURL (string)
     * in: NewUsername (string)
     * in: NewPassword (string)
     * in: NewMountpointName (string)
     *
     * @param bool $enable
     * @param string $hostURL
     * @param string $username
     * @param string $password
     * @param string $mountpointName
     * @return void
     */
    public function setConfig($enable, $hostURL, $username, $password, $mountpointName)
    {
        $result = $this->client->SetConfig(
            new \SoapParam($enable, 'NewEnable'),
            new \SoapParam($hostURL, 'NewHostURL'),
            new \SoapParam($username, 'NewUsername'),
            new \SoapParam($password, 'NewPassword'),
            new \SoapParam($mountpointName, 'NewMountpointName'));
        $state = $this->boolToState($enable);
        $message = sprintf('Could not %s WebDAV %s config at FRITZ!Box', $state, $mountpointName);
        $this->errorHandling($result, $message);
    }
}
