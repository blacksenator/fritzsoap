<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides functions to read and manipulate data via SOAP interface
 * on FRITZ!Box router from AVM.
 *
 * @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/wanethlinkconfigSCPD.pdf
 *
 * @author Volker Püschel <knuffy@anasco.de>
 * @copyright Volker Püschel 2019 - 2025
 * @license MIT
**/

use blacksenator\fritzsoap\fritzsoap;

class wanethlinkconfig1 extends fritzsoap
{
    const
        SERVICE_TYPE = 'urn:dslforum-org:service:WANEthernetLinkConfig:1',
        CONTROL_URL  = '/upnp/control/wanethlinkconfig1';

    /**
     * getEthernetLinkStatus
     *
     * returns ethernet link state
     *
     * out: NewEthernetLinkStatus (string)
     *
     * @return string
     */
    public function getEthernetLinkStatus()
    {
        $result = $this->client->GetEthernetLinkStatus();
        if ($this->errorHandling($result, 'Could not get ethernet link state from FRITZ!Box')) {
            return;
        }

        return $result;
    }
}
