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
* @copyright Volker Püschel 2020
* @license MIT
**/

use blacksenator\fritzsoap\fritzsoap;

class Control6 extends fritzsoap
{
    /**
     * getProtocolInfo
     *
     * automatically generated; complete coding if necessary!
     *
     * out: Source
     * out: Sink
     *
     */
    public function getProtocolInfo()
    {
        $result = $this->client->GetProtocolInfo();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * getCurrentConnectionIDs
     *
     * automatically generated; complete coding if necessary!
     *
     * out: ConnectionIDs
     *
     */
    public function getCurrentConnectionIDs()
    {
        $result = $this->client->GetCurrentConnectionIDs();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * getCurrentConnectionInfo
     *
     * automatically generated; complete coding if necessary!
     *
     * in: ConnectionID
     * out: RcsID
     * out: AVTransportID
     * out: ProtocolInfo
     * out: PeerConnectionManager
     * out: PeerConnectionID
     * out: Direction
     * out: Status
     *
     */
    public function getCurrentConnectionInfo()
    {
        $result = $this->client->GetCurrentConnectionInfo();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

}
