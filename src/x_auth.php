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

class x_auth extends fritzsoap
{
    /**
     * getInfo
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewEnabled (boolean)
     *
     * @return bool
     */
    public function getInfo()
    {
        $result = $this->client->GetInfo();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getState
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewState (string)
     *
     * @return string
     */
    public function getState()
    {
        $result = $this->client->GetState();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
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
