<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides functions to read and manipulate
 * data via TR-064 interface on FRITZ!Box router from AVM.
 * No specific documentation available!
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
 * @copyright Volker Püschel 2019 - 2021
 * @license MIT
**/

use blacksenator\fritzsoap\fritzsoap;

class Control_4 extends fritzsoap
{
    const
        SERVICE_TYPE = 'urn:microsoft.com:service:X_MS_MediaReceiverRegistrar:1',
        CONTROL_URL  = '/MediaServer/MediaReceiverRegistrar/Control';

    /**
     * isAuthorized
     *
     * automatically generated; complete coding if necessary!
     *
     * in: DeviceID (string)
     * out: Result (int)
     *
     * @param string $deviceID
     * @return int
     */
    public function isAuthorized($deviceID)
    {
        $result = $this->client->IsAuthorized(
            new \SoapParam($deviceID, 'DeviceID'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return null;
        }

        return $result;
    }

    /**
     * isValidated
     *
     * automatically generated; complete coding if necessary!
     *
     * in: DeviceID (string)
     * out: Result (int)
     *
     * @param string $deviceID
     * @return int
     */
    public function isValidated($deviceID)
    {
        $result = $this->client->IsValidated(
            new \SoapParam($deviceID, 'DeviceID'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return null;
        }

        return $result;
    }

}
