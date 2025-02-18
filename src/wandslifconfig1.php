<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides functions to read and manipulate data via SOAP interface
 * on FRITZ!Box router from AVM.
 *
 * @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/wandslifconfigSCPD.pdf
 *
 * @author Volker Püschel <knuffy@anasco.de>
 * @copyright Volker Püschel 2019 - 2025
 * @license MIT
**/

use blacksenator\fritzsoap\fritzsoap;

class wandslifconfig1 extends fritzsoap
{
    const
        SERVICE_TYPE = 'urn:dslforum-org:service:WANDSLInterfaceConfig:1',
        CONTROL_URL  = '/upnp/control/wandslifconfig1';

    /**
     * getInfo
     *
     * out: NewEnable (boolean)
     * out: NewStatus (string)
     * out: NewDataPath (string)
     * out: NewUpstreamCurrRate (i4)
     * out: NewDownstreamCurrRate (ui4)
     * out: NewUpstreamMaxRate (ui4)
     * out: NewDownstreamMaxRate (ui4)
     * out: NewUpstreamNoiseMargin (ui4)
     * out: NewDownstreamNoiseMargin (ui4)
     * out: NewUpstreamAttenuation (ui4)
     * out: NewDownstreamAttenuation (ui4)
     * out: NewATURVendor (string)
     * out: NewATURCountry (string)
     * out: NewUpstreamPower (ui2)
     * out: NewDownstreamPower (ui2)
     *
     * @return array
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
     * getStatisticsTotal
     *
     * out: NewReceiveBlocks (ui4)
     * out: NewTransmitBlocks (ui4)
     * out: NewCellDelin (ui4)
     * out: NewLinkRetrain (ui4)
     * out: NewInitErrors (ui4)
     * out: NewInitTimeouts (ui4)
     * out: NewLossOfFraming (ui4)
     * out: NewErroredSecs (ui4)
     * out: NewSeverelyErroredSecs (ui4)
     * out: NewFECErrors (ui4)
     * out: NewATUCFECErrors (ui4)
     * out: NewHECErrors (ui4)
     * out: NewATUCHECErrors (ui4)
     * out: NewCRCErrors (ui4)
     * out: NewATUCCRCErrors (ui4)
     *
     * @return array
     */
    public function getStatisticsTotal()
    {
        $result = $this->client->GetStatisticsTotal();
        if ($this->errorHandling($result, 'Could not get statistics total from FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetDSLDiagnoseInfo
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewX_AVM-DE_DSLDiagnoseState (string)
     * out: NewX_AVM-DE_CableNokDistance (i4)
     * out: NewX_AVM-DE_DSLLastDiagnoseTime (ui4)
     * out: NewX_AVM-DE_DSLSignalLossTime (ui4)
     * out: NewX_AVM-DE_DSLActive (boolean)
     * out: NewX_AVM-DE_DSLSync (boolean)
     *
     * @return array
     */
    public function x_AVM_DE_GetDSLDiagnoseInfo()
    {
        $result = $this->client->{'X_AVM-DE_GetDSLDiagnoseInfo'}();
        if ($this->errorHandling($result, 'Could not get DSL diagnose info from FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetDSLInfo
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewSNRGds (ui4)
     * out: NewSNRGus (ui4)
     * out: NewSNRpsds (string)
     * out: NewSNRpsus (string)
     * out: NewSNRMTds (ui4)
     * out: NewSNRMTus (ui4)
     * out: NewLATNds (string)
     * out: NewLATNus (string)
     * out: NewFECErrors (ui4)
     * out: NewCRCErrors (ui4)
     * out: NewLinkStatus (string)
     * out: NewModulationType (string)
     * out: NewCurrentProfile (string)
     * out: NewUpstreamCurrRate (i4)
     * out: NewDownstreamCurrRate (ui4)
     * out: NewUpstreamMaxRate (ui4)
     * out: NewDownstreamMaxRate (ui4)
     * out: NewUpstreamNoiseMargin (ui4)
     * out: NewDownstreamNoiseMargin (ui4)
     * out: NewUpstreamAttenuation (ui4)
     * out: NewDownstreamAttenuation (ui4)
     * out: NewATURVendor (string)
     * out: NewATURCountry (string)
     * out: NewUpstreamPower (ui2)
     * out: NewDownstreamPower (ui2)
     *
     * @return array
     */
    public function x_AVM_DE_GetDSLInfo()
    {
        $result = $this->client->{'X_AVM-DE_GetDSLInfo'}();
        if ($this->errorHandling($result, 'Could not get DSL info from FRITZ!Box')) {
            return;
        }

        return $result;
    }
}
