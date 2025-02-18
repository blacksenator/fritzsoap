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

class Control_5 extends fritzsoap
{
    const
        SERVICE_TYPE = 'urn:schemas-upnp-org:service:ConnectionManager:1',
        CONTROL_URL  = '/MediaServer/ConnectionManager/Control';

    /**
     * getProtocolInfo
     *
     * automatically generated; complete coding if necessary!
     *
     * out: Source (string)
     * out: Sink (string)
     *
     * @return array
     */
    public function getProtocolInfo()
    {
        $result = $this->client->GetProtocolInfo();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getCurrentConnectionIDs
     *
     * automatically generated; complete coding if necessary!
     *
     * out: ConnectionIDs (string)
     *
     * @return string
     */
    public function getCurrentConnectionIDs()
    {
        $result = $this->client->GetCurrentConnectionIDs();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getCurrentConnectionInfo
     *
     * automatically generated; complete coding if necessary!
     *
     * in: ConnectionID (i4)
     * out: RcsID (i4)
     * out: AVTransportID (i4)
     * out: ProtocolInfo (string)
     * out: PeerConnectionManager (string)
     * out: PeerConnectionID (i4)
     * out: Direction (string)
     * out: Status (string)
     *
     * @param int $connectionID
     * @return array
     */
    public function getCurrentConnectionInfo($connectionID)
    {
        $result = $this->client->GetCurrentConnectionInfo(
            new \SoapParam($connectionID, 'ConnectionID'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }
}
