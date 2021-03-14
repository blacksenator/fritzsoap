<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides functions to read and manipulate
 * data via TR-064 interface on FRITZ!Box router from AVM.
 * No documentation available!
 * @see: https://avm.de/service/schnittstellen/
 *
 * +++++++++++++++++++++ ATTENTION +++++++++++++++++++++
 *
 *    ! NO LONGER INCLUDED IN THE SCOPE OF SERVICE !
 *
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

class fritzbox extends fritzsoap
{
    const
        SERVICE_TYPE = 'urn:schemas-any-com:service:fritzbox:1',
        CONTROL_URL  = '/upnp/control/fritzbox';

    /**
     * setLogParam
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewLogPort
     * in: NewLogLevel
     *
     */
    public function setLogParam()
    {
        $result = $this->client->SetLogParam();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * getMaclist
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewMaclist
     * out: NewMaclistChangeCounter
     *
     */
    public function getMaclist()
    {
        $result = $this->client->GetMaclist();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

}
