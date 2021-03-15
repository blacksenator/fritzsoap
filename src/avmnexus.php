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

class avmnexus extends fritzsoap
{
    const
        SERVICE_TYPE = 'urn:schemas-any-com:service:avmnexus:1',
        CONTROL_URL  = '/upnp/control/avmnexus';

    /**
     * getNexusPort
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewNexusPort (ui2)
     *
     * @return int
     */
    public function getNexusPort()
    {
        $result = $this->client->GetNexusPort();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

}
