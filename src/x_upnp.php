<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides functions to read and manipulate data via SOAP interface
 * on FRITZ!Box router from AVM.
 *
 * @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/x_upnp.pdf
 *
 * @author Volker Püschel <knuffy@anasco.de>
 * @copyright Volker Püschel 2019 - 2025
 * @license MIT
**/

use blacksenator\fritzsoap\fritzsoap;

class x_upnp extends fritzsoap
{
    const
        SERVICE_TYPE = 'urn:dslforum-org:service:X_AVM-DE_UPnP:1',
        CONTROL_URL  = '/upnp/control/x_upnp';

    /**
     * getInfo
     *
     * out: NewEnable (boolean)
     * out: NewUPnPMediaServer (boolean)
     *
     * @return array
     */
    public function getInfo()
    {
        $result = $this->client->GetInfo();
        if ($this->errorHandling($result, 'Could not get UPnP info from FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setConfig
     *
     * in: NewEnable (boolean)
     * in: NewUPnPMediaServer (boolean)
     *
     * @param bool $enable
     * @param bool $uPnPMediaServer
     * @return void
     */
    public function setConfig($enable, $uPnPMediaServer)
    {
        $result = $this->client->SetConfig(
            new \SoapParam($enable, 'NewEnable'),
            new \SoapParam($uPnPMediaServer, 'NewUPnPMediaServer'));
        $this->errorHandling($result, 'Could not set UPnP config at FRITZ!Box');
    }
}
