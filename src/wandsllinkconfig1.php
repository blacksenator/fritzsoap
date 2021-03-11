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

class wandsllinkconfig1 extends fritzsoap
{
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
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
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
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
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
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
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
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
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
