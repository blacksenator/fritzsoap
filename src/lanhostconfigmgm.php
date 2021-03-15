<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides functions to read and manipulate
 * data via TR-064 interface on FRITZ!Box router from AVM:
 *
 * @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/lanhostconfigmgmSCPD.pdf
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

class lanhostconfigmgm extends fritzsoap
{
    const
        SERVICE_TYPE = 'urn:dslforum-org:service:LANHostConfigManagement:1',
        CONTROL_URL  = '/upnp/control/lanhostconfigmgm';

    /**
     * getInfo
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewDHCPServerConfigurable (boolean)
     * out: NewDHCPRelay (boolean)
     * out: NewMinAddress (string)
     * out: NewMaxAddress (string)
     * out: NewReservedAddresses (string)
     * out: NewDHCPServerEnable (boolean)
     * out: NewDNSServers (string)
     * out: NewDomainName (string)
     * out: NewIPRouters (string)
     * out: NewSubnetMask (string)
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
     * setDHCPServerEnable
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewDHCPServerEnable (boolean)
     *
     * @param bool $dHCPServerEnable
     * @return void
     */
    public function setDHCPServerEnable($dHCPServerEnable)
    {
        $result = $this->client->SetDHCPServerEnable(
            new \SoapParam($dHCPServerEnable, 'NewDHCPServerEnable'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setIPInterface
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewEnable (boolean)
     * in: NewIPAddress (string)
     * in: NewSubnetMask (string)
     * in: NewIPAddressingType (string)
     *
     * @param bool $enable
     * @param string $iPAddress
     * @param string $subnetMask
     * @param string $iPAddressingType
     * @return void
     */
    public function setIPInterface($enable, $iPAddress, $subnetMask, $iPAddressingType)
    {
        $result = $this->client->SetIPInterface(
            new \SoapParam($enable, 'NewEnable'),
            new \SoapParam($iPAddress, 'NewIPAddress'),
            new \SoapParam($subnetMask, 'NewSubnetMask'),
            new \SoapParam($iPAddressingType, 'NewIPAddressingType'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getAddressRange
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewMinAddress (string)
     * out: NewMaxAddress (string)
     *
     * @return array
     */
    public function getAddressRange()
    {
        $result = $this->client->GetAddressRange();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setAddressRange
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewMinAddress (string)
     * in: NewMaxAddress (string)
     *
     * @param string $minAddress
     * @param string $maxAddress
     * @return void
     */
    public function setAddressRange($minAddress, $maxAddress)
    {
        $result = $this->client->SetAddressRange(
            new \SoapParam($minAddress, 'NewMinAddress'),
            new \SoapParam($maxAddress, 'NewMaxAddress'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getIPRoutersList
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewIPRouters (string)
     *
     * @return string
     */
    public function getIPRoutersList()
    {
        $result = $this->client->GetIPRoutersList();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setIPRouter
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewIPRouters (string)
     *
     * @param string $iPRouters
     * @return void
     */
    public function setIPRouter($iPRouters)
    {
        $result = $this->client->SetIPRouter(
            new \SoapParam($iPRouters, 'NewIPRouters'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getSubnetMask
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewSubnetMask (string)
     *
     * @return string
     */
    public function getSubnetMask()
    {
        $result = $this->client->GetSubnetMask();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setSubnetMask
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewSubnetMask (string)
     *
     * @param string $subnetMask
     * @return void
     */
    public function setSubnetMask($subnetMask)
    {
        $result = $this->client->SetSubnetMask(
            new \SoapParam($subnetMask, 'NewSubnetMask'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getDNSServers
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewDNSServers (string)
     *
     * @return string
     */
    public function getDNSServers()
    {
        $result = $this->client->GetDNSServers();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getIPInterfaceNumberOfEntries
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewIPInterfaceNumberOfEntries (ui2)
     *
     * @return int
     */
    public function getIPInterfaceNumberOfEntries()
    {
        $result = $this->client->GetIPInterfaceNumberOfEntries();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

}
