<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides functions to read and manipulate data via SOAP interface
 * on FRITZ!Box router from AVM.
 * No specific documentation available! As of FRITZ!OS 7.50, control services
 * can no longer be found in the description files
 *
 * @see: https://avm.de/service/schnittstellen/
 *
 * +++++++++++++++++++++ ATTENTION +++++++++++++++++++++
 * THIS FILE IS AUTOMATIC ASSEMBLED!
 * ALL FUNCTIONS ARE FRAMEWORKS AND HAVE TO BE CORRECTLY
 * CODED, IF THEIR COMMENT WAS NOT OVERWRITTEN!
 * +++++++++++++++++++++++++++++++++++++++++++++++++++++
 *
 * @author Volker Püschel <knuffy@anasco.de>
 * @copyright Volker Püschel 2019 - 2025
 * @license MIT
**/

use blacksenator\fritzsoap\fritzsoap;

class Control_3 extends fritzsoap
{
    const
        SERVICE_TYPE = 'urn:avm.de:service:AVM_ServerStatus:1',
        CONTROL_URL  = '/MediaServer/ServerStatus/Control';

    /**
     * scanInfo
     *
     * automatically generated; complete coding if necessary!
     *
     * out: StartTime (string)
     * out: EndTime (string)
     * out: AudioFiles (ui4)
     * out: MovieFiles (ui4)
     * out: ImageFiles (ui4)
     *
     * @return array
     */
    public function scanInfo()
    {
        $result = $this->client->ScanInfo();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }
}
