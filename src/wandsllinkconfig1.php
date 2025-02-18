<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides functions to read and manipulate data via SOAP interface
 * on FRITZ!Box router from AVM.
 *
 * @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/wandsllinkconfigSCPD.pdf
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

class wandsllinkconfig1 extends fritzsoap
{
    const
        SERVICE_TYPE = 'urn:dslforum-org:service:WANDSLLinkConfig:1',
        CONTROL_URL  = '/upnp/control/wandsllinkconfig1';

    /**
     * getInfo
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewEnable (boolean)
     * out: NewLinkStatus (string)
     * out: NewLinkType (string)
     * out: NewDestinationAddress (string)
     * out: NewATMEncapsulation (string)
     * out: NewAutoConfig (boolean)
     * out: NewATMQoS (string)
     * out: NewATMPeakCellRate (ui4)
     * out: NewATMSustainableCellRate (ui4)
     *
     * @return array
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
     * setEnable
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewEnable (boolean)
     *
     * @param bool $enable
     * @return void
     */
    public function setEnable($enable)
    {
        $result = $this->client->SetEnable(
            new \SoapParam($enable, 'NewEnable'));
        $this->errorHandling($result, 'Could not ... from/to FRITZ!Box');
    }

    /**
     * getAutoConfig
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewAutoConfig (boolean)
     *
     * @return bool
     */
    public function getAutoConfig()
    {
        $result = $this->client->GetAutoConfig();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setDSLLinkType
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewLinkType (string)
     *
     * @param string $linkType
     * @return void
     */
    public function setDSLLinkType($linkType)
    {
        $result = $this->client->SetDSLLinkType(
            new \SoapParam($linkType, 'NewLinkType'));
        $this->errorHandling($result, 'Could not ... from/to FRITZ!Box');
    }

    /**
     * getDSLLinkInfo
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewLinkType (string)
     * out: NewLinkStatus (string)
     *
     * @return array
     */
    public function getDSLLinkInfo()
    {
        $result = $this->client->GetDSLLinkInfo();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setDestinationAddress
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewDestinationAddress (string)
     *
     * @param string $destinationAddress
     * @return void
     */
    public function setDestinationAddress($destinationAddress)
    {
        $result = $this->client->SetDestinationAddress(
            new \SoapParam($destinationAddress, 'NewDestinationAddress'));
        $this->errorHandling($result, 'Could not ... from/to FRITZ!Box');
    }

    /**
     * getDestinationAddress
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewDestinationAddress (string)
     *
     * @return string
     */
    public function getDestinationAddress()
    {
        $result = $this->client->GetDestinationAddress();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setATMEncapsulation
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewATMEncapsulation (string)
     *
     * @param string $aTMEncapsulation
     * @return void
     */
    public function setATMEncapsulation($aTMEncapsulation)
    {
        $result = $this->client->SetATMEncapsulation(
            new \SoapParam($aTMEncapsulation, 'NewATMEncapsulation'));
        $this->errorHandling($result, 'Could not ... from/to FRITZ!Box');
    }

    /**
     * getATMEncapsulation
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewATMEncapsulation (string)
     *
     * @return string
     */
    public function getATMEncapsulation()
    {
        $result = $this->client->GetATMEncapsulation();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getStatistics
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewATMTransmittedBlocks (ui4)
     * out: NewATMReceivedBlocks (ui4)
     * out: NewAAL5CRCErrors (ui4)
     * out: NewATMCRCErrors (ui4)
     *
     * @return array
     */
    public function getStatistics()
    {
        $result = $this->client->GetStatistics();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }
}
