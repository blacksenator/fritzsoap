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

class avmnexus extends fritzsoap
{
    const
        SERVICE_TYPE = 'urn:schemas-any-com:service:avmnexus:1',
        CONTROL_URL  = '/upnp/control/avmnexus';

    /**
     * getNexusPort
     *
     * returns nexus port adress
     *
     * out: NewNexusPort (ui2)
     *
     * @return int
     */
    public function getNexusPort()
    {
        $result = $this->client->GetNexusPort();
        if ($this->errorHandling($result, 'Could not get nexus port from FRITZ!Box')) {
            return;
        }

        return $result;
    }
}
