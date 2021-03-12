<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides functions to read and manipulate
 * data via TR-064 interface on FRITZ!Box router from AVM.
 * No documentation available!
 * @see: https://avm.de/service/schnittstellen/
 *
 * With the instantiation of the class, all available
 * services of the addressed FRITZ!Box are determined.
 * The service parameters and available actions are
 * provided in a compressed form as XML and can be output
 * with getServiceDescription().
 * The matching SOAP client only needs to be called with
 * the name of the services <services name = "..."> and
 * gets the correct location and uri from the XML
 * (see getFritzBoxServices() for details)
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

class Control3 extends fritzsoap
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
            return;
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
            return;
        }

        return $result;
    }

}
