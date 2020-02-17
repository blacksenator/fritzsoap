<?php

namespace blacksenator\fritzsoap;

/**
* The class provides functions to read and manipulate
* data via TR-064 interface on FRITZ!Box router from AVM:
* according to:
* @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/lanifcfgSCPD.pdf
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

class lanethernetifcfg extends fritzsoap
{
    /**
     * setEnable
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewEnable
     *
     */
    public function setEnable()
    {
        $result = $this->client->SetEnable();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * getInfo
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewEnable
     * out: NewStatus
     * out: NewMACAddress
     * out: NewMaxBitRate
     * out: NewDuplexMode
     *
     */
    public function getInfo()
    {
        $result = $this->client->GetInfo();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * getStatistics
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewBytesSent
     * out: NewBytesReceived
     * out: NewPacketsSent
     * out: NewPacketsReceived
     *
     */
    public function getStatistics()
    {
        $result = $this->client->GetStatistics();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

}
