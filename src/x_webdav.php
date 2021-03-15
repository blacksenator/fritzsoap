<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides functions to read and manipulate
 * data via TR-064 interface on FRITZ!Box router from AVM:
 *
 * @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/x_webdavSCPD.pdf
 *
 * +++++++++++++++++++++ ATTENTION +++++++++++++++++++++
 * THIS FILE IS AUTOMATIC ASSEMBLED!
 * ALL FUNCTIONS ARE FRAMEWORKS AND HAVE TO BE CORRECTLY
 * CODED, IF THEIR COMMENT WAS NOT OVERWRITTEN!
 * +++++++++++++++++++++++++++++++++++++++++++++++++++++
 *
 * @author Volker Püschel <knuffy@anasco.de>
 * @copyright Volker Püschel 2019 - 2021
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
     * automatically generated; complete coding if necessary!
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
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

}
