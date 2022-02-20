<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides functions to read and manipulate
 * data via TR-064 interface on FRITZ!Box router from AVM.
 *
 * @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/x_auth.pdf
 *
 * +++++++++++++++++++++ ATTENTION +++++++++++++++++++++
 * THIS FILE IS AUTOMATIC ASSEMBLED BUT PARTLY REVIEWED!
 * ALL FUNCTIONS ARE FRAMEWORKS AND HAVE TO BE CORRECTLY
 * CODED, IF THEIR COMMENT WAS NOT OVERWRITTEN!
 * +++++++++++++++++++++++++++++++++++++++++++++++++++++
 *
 * @author Volker Püschel <knuffy@anasco.de>
 * @copyright Volker Püschel 2022
 * @license MIT
**/

use blacksenator\fritzsoap\fritzsoap;

class x_auth extends fritzsoap
{
    const
        SERVICE_TYPE = 'urn:dslforum-org:service:X_AVM-DE_Auth:1',
        CONTROL_URL  = '/upnp/control/x_auth';

    /**
     * getInfo
     *
     * returns info
     *
     * out: NewEnabled (boolean)
     *
     * @return bool
     */
    public function getInfo()
    {
        $result = $this->client->GetInfo();
        if ($this->errorHandling($result, 'Could not get info from FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getState
     *
     * return state
     *
     * out: NewState (string)
     *
     * @return string
     */
    public function getState()
    {
        $result = $this->client->GetState();
        if ($this->errorHandling($result, 'Could not get state from FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setConfig
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewAction (string)
     * out: NewState (string)
     * out: NewToken (string)
     * out: NewMethods (string)
     *
     * @param string $action
     * @return array
     */
    public function setConfig($action)
    {
        $result = $this->client->SetConfig(
            new \SoapParam($action, 'NewAction'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }
}
