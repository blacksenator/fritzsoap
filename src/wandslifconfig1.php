<?php

namespace blacksenator\fritzsoap;

/**
* The class provides functions to read and manipulate
* data via TR-064 interface on FRITZ!Box router from AVM
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

class wandslifconfig1 extends fritzsoap
{
    /**
     * getInfo
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewEnable
     * out: NewStatus
     * out: NewDataPath
     * out: NewUpstreamCurrRate
     * out: NewDownstreamCurrRate
     * out: NewUpstreamMaxRate
     * out: NewDownstreamMaxRate
     * out: NewUpstreamNoiseMargin
     * out: NewDownstreamNoiseMargin
     * out: NewUpstreamAttenuation
     * out: NewDownstreamAttenuation
     * out: NewATURVendor
     * out: NewATURCountry
     * out: NewUpstreamPower
     * out: NewDownstreamPower
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
     * getStatisticsTotal
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewReceiveBlocks
     * out: NewTransmitBlocks
     * out: NewCellDelin
     * out: NewLinkRetrain
     * out: NewInitErrors
     * out: NewInitTimeouts
     * out: NewLossOfFraming
     * out: NewErroredSecs
     * out: NewSeverelyErroredSecs
     * out: NewFECErrors
     * out: NewATUCFECErrors
     * out: NewHECErrors
     * out: NewATUCHECErrors
     * out: NewCRCErrors
     * out: NewATUCCRCErrors
     *
     */
    public function getStatisticsTotal()
    {
        $result = $this->client->GetStatisticsTotal();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetDSLDiagnoseInfo
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewX_AVM-DE_DSLDiagnoseState
     * out: NewX_AVM-DE_CableNokDistance
     * out: NewX_AVM-DE_DSLLastDiagnoseTime
     * out: NewX_AVM-DE_DSLSignalLossTime
     * out: NewX_AVM-DE_DSLActive
     * out: NewX_AVM-DE_DSLSync
     *
     */
    public function x_AVM_DE_GetDSLDiagnoseInfo()
    {
        $result = $this->client->{'X_AVM-DE_GetDSLDiagnoseInfo'}();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetDSLInfo
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewSNRGds
     * out: NewSNRGus
     * out: NewSNRpsds
     * out: NewSNRpsus
     * out: NewSNRMTds
     * out: NewSNRMTus
     * out: NewLATNds
     * out: NewLATNus
     * out: NewFECErrors
     * out: NewCRCErrors
     * out: NewLinkStatus
     * out: NewModulationType
     * out: NewCurrentProfile
     * out: NewUpstreamCurrRate
     * out: NewDownstreamCurrRate
     * out: NewUpstreamMaxRate
     * out: NewDownstreamMaxRate
     * out: NewUpstreamNoiseMargin
     * out: NewDownstreamNoiseMargin
     * out: NewUpstreamAttenuation
     * out: NewDownstreamAttenuation
     * out: NewATURVendor
     * out: NewATURCountry
     * out: NewUpstreamPower
     * out: NewDownstreamPower
     *
     */
    public function x_AVM_DE_GetDSLInfo()
    {
        $result = $this->client->{'X_AVM-DE_GetDSLInfo'}();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

}
