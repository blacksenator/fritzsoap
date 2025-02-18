<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides functions to read and manipulate data via SOAP interface
 * on FRITZ!Box router or repeater from AVM.
 * No specific documentation available!
 *
 * @see: https://avm.de/service/schnittstellen/
 *
 * @author Volker Püschel <knuffy@anasco.de>
 * @copyright Volker Püschel 2019 - 2025
 * @license MIT
**/

use blacksenator\fritzsoap\fritzsoap;

class fritzbox extends fritzsoap
{
    const
        SERVICE_TYPE = 'urn:schemas-any-com:service:fritzbox:1',
        CONTROL_URL  = '/upnp/control/fritzbox';

    /**
     * setLogParam
     *
     * in: NewLogPort (ui2)
     * in: NewLogLevel (string)
     *
     * @param int $logPort
     * @param string $logLevel
     * @return void
     */
    public function setLogParam($logPort, $logLevel)
    {
        $result = $this->client->SetLogParam(
            new \SoapParam($logPort, 'NewLogPort'),
            new \SoapParam($logLevel, 'NewLogLevel'));
        $this->errorHandling($result, 'Could not set log parameter at FRITZ!Box');
    }

    /**
     * getMaclist
     *
     * out: NewMaclist (string)
     * out: NewMaclistChangeCounter (ui2)
     *
     * @return array
     */
    public function getMaclist()
    {
        $result = $this->client->GetMaclist();
        if ($this->errorHandling($result, 'Could not get MAC list from FRITZ!Box')) {
            return;
        }

        return $result;
    }
}
