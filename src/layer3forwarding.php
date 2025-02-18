<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides functions to read and manipulate data via SOAP interface
 * on FRITZ!Box router from AVM:
 *
 * @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/layer3forwardingSCPD.pdf
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

class layer3forwarding extends fritzsoap
{
    const
        SERVICE_TYPE = 'urn:dslforum-org:service:Layer3Forwarding:1',
        CONTROL_URL  = '/upnp/control/layer3forwarding';

    /**
     * setDefaultConnectionService
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewDefaultConnectionService (string)
     *
     * @param string $defaultConnectionService
     * @return void
     */
    public function setDefaultConnectionService($defaultConnectionService)
    {
        $result = $this->client->SetDefaultConnectionService(
            new \SoapParam($defaultConnectionService, 'NewDefaultConnectionService'));
        $this->errorHandling($result, 'Could not ... from/to FRITZ!Box');
    }

    /**
     * getDefaultConnectionService
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewDefaultConnectionService (string)
     *
     * @return string
     */
    public function getDefaultConnectionService()
    {
        $result = $this->client->GetDefaultConnectionService();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getForwardNumberOfEntries
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewForwardNumberOfEntries (ui2)
     *
     * @return int
     */
    public function getForwardNumberOfEntries()
    {
        $result = $this->client->GetForwardNumberOfEntries();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * addForwardingEntry
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewType (string)
     * in: NewDestIPAddress (string)
     * in: NewDestSubnetMask (string)
     * in: NewSourceIPAddress (string)
     * in: NewSourceSubnetMask (string)
     * in: NewGatewayIPAddress (string)
     * in: NewInterface (string)
     * in: NewForwardingMetric (i4)
     *
     * @param string $type
     * @param string $destIPAddress
     * @param string $destSubnetMask
     * @param string $sourceIPAddress
     * @param string $sourceSubnetMask
     * @param string $gatewayIPAddress
     * @param string $interface
     * @param int $forwardingMetric
     * @return void
     */
    public function addForwardingEntry($type, $destIPAddress, $destSubnetMask, $sourceIPAddress, $sourceSubnetMask, $gatewayIPAddress, $interface, $forwardingMetric)
    {
        $result = $this->client->AddForwardingEntry(
            new \SoapParam($type, 'NewType'),
            new \SoapParam($destIPAddress, 'NewDestIPAddress'),
            new \SoapParam($destSubnetMask, 'NewDestSubnetMask'),
            new \SoapParam($sourceIPAddress, 'NewSourceIPAddress'),
            new \SoapParam($sourceSubnetMask, 'NewSourceSubnetMask'),
            new \SoapParam($gatewayIPAddress, 'NewGatewayIPAddress'),
            new \SoapParam($interface, 'NewInterface'),
            new \SoapParam($forwardingMetric, 'NewForwardingMetric'));
        $this->errorHandling($result, 'Could not ... from/to FRITZ!Box');
    }

    /**
     * deleteForwardingEntry
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewDestIPAddress (string)
     * in: NewDestSubnetMask (string)
     * in: NewSourceIPAddress (string)
     * in: NewSourceSubnetMask (string)
     *
     * @param string $destIPAddress
     * @param string $destSubnetMask
     * @param string $sourceIPAddress
     * @param string $sourceSubnetMask
     * @return void
     */
    public function deleteForwardingEntry($destIPAddress, $destSubnetMask, $sourceIPAddress, $sourceSubnetMask)
    {
        $result = $this->client->DeleteForwardingEntry(
            new \SoapParam($destIPAddress, 'NewDestIPAddress'),
            new \SoapParam($destSubnetMask, 'NewDestSubnetMask'),
            new \SoapParam($sourceIPAddress, 'NewSourceIPAddress'),
            new \SoapParam($sourceSubnetMask, 'NewSourceSubnetMask'));
        $this->errorHandling($result, 'Could not ... from/to FRITZ!Box');
    }

    /**
     * getSpecificForwardingEntry
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewDestIPAddress (string)
     * in: NewDestSubnetMask (string)
     * in: NewSourceIPAddress (string)
     * in: NewSourceSubnetMask (string)
     * out: NewGatewayIPAddress (string)
     * out: NewEnable (boolean)
     * out: NewStatus (string)
     * out: NewType (string)
     * out: NewInterface (string)
     * out: NewForwardingMetric (i4)
     *
     * @param string $destIPAddress
     * @param string $destSubnetMask
     * @param string $sourceIPAddress
     * @param string $sourceSubnetMask
     * @return array
     */
    public function getSpecificForwardingEntry($destIPAddress, $destSubnetMask, $sourceIPAddress, $sourceSubnetMask)
    {
        $result = $this->client->GetSpecificForwardingEntry(
            new \SoapParam($destIPAddress, 'NewDestIPAddress'),
            new \SoapParam($destSubnetMask, 'NewDestSubnetMask'),
            new \SoapParam($sourceIPAddress, 'NewSourceIPAddress'),
            new \SoapParam($sourceSubnetMask, 'NewSourceSubnetMask'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getGenericForwardingEntry
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewForwardingIndex (ui2)
     * out: NewEnable (boolean)
     * out: NewStatus (string)
     * out: NewType (string)
     * out: NewDestIPAddress (string)
     * out: NewDestSubnetMask (string)
     * out: NewSourceIPAddress (string)
     * out: NewSourceSubnetMask (string)
     * out: NewGatewayIPAddress (string)
     * out: NewInterface (string)
     * out: NewForwardingMetric (i4)
     *
     * @param int $forwardingIndex
     * @return array
     */
    public function getGenericForwardingEntry($forwardingIndex)
    {
        $result = $this->client->GetGenericForwardingEntry(
            new \SoapParam($forwardingIndex, 'NewForwardingIndex'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setForwardingEntryEnable
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewDestIPAddress (string)
     * in: NewDestSubnetMask (string)
     * in: NewSourceIPAddress (string)
     * in: NewSourceSubnetMask (string)
     * in: NewEnable (boolean)
     *
     * @param string $destIPAddress
     * @param string $destSubnetMask
     * @param string $sourceIPAddress
     * @param string $sourceSubnetMask
     * @param bool $enable
     * @return void
     */
    public function setForwardingEntryEnable($destIPAddress, $destSubnetMask, $sourceIPAddress, $sourceSubnetMask, $enable)
    {
        $result = $this->client->SetForwardingEntryEnable(
            new \SoapParam($destIPAddress, 'NewDestIPAddress'),
            new \SoapParam($destSubnetMask, 'NewDestSubnetMask'),
            new \SoapParam($sourceIPAddress, 'NewSourceIPAddress'),
            new \SoapParam($sourceSubnetMask, 'NewSourceSubnetMask'),
            new \SoapParam($enable, 'NewEnable'));
        $this->errorHandling($result, 'Could not ... from/to FRITZ!Box');
    }
}
