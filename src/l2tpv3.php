<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides functions to read and manipulate data via SOAP interface
 * on FRITZ!Box router from AVM.
 * No specific documentation available!
 *
 * @see: https://avm.de/service/schnittstellen/
 *
 * @author Volker Püschel <knuffy@anasco.de>
 * @copyright Volker Püschel 2019 - 2025
 * @license MIT
**/

use blacksenator\fritzsoap\fritzsoap;

class l2tpv3 extends fritzsoap
{
    const
        SERVICE_TYPE = 'urn:schemas-any-com:service:l2tpv3:1',
        CONTROL_URL  = '/upnp/control/l2tpv3';

    /**
     * getInfo
     *
     * returns info
     *
     * out: ServerIP (string)
     * out: ServerInstanceId (string)
     * out: RemoteEndIds (string)
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
}
