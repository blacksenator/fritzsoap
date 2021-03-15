<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides functions to read and manipulate
 * data via TR-064 interface on FRITZ!Box router from AVM:
 *
 * @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/x_myfritzSCPD.pdf
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

class x_myfritz extends fritzsoap
{
    const
        SERVICE_TYPE = 'urn:dslforum-org:service:X_AVM-DE_MyFritz:1',
        CONTROL_URL  = '/upnp/control/x_myfritz';

    /**
     * getInfo
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewEnabled (boolean)
     * out: NewDeviceRegistered (boolean)
     * out: NewDynDNSName (string)
     * out: NewPort (ui4)
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
     * getNumberOfServices
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewNumberOfServices (ui4)
     *
     * @return int
     */
    public function getNumberOfServices()
    {
        $result = $this->client->GetNumberOfServices();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getServiceByIndex
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewIndex (ui4)
     * out: NewEnabled (boolean)
     * out: NewName (string)
     * out: NewScheme (string)
     * out: NewPort (ui4)
     * out: NewURLPath (string)
     * out: NewType (string)
     * out: NewIPv4ForwardingWarning (ui1)
     * out: NewIPv4Addresses (string)
     * out: NewIPv6Addresses (string)
     * out: NewIPv6InterfaceIDs (string)
     * out: NewMACAddress (string)
     * out: NewHostName (string)
     * out: NewDynDnsLabel (string)
     * out: NewStatus (ui4)
     *
     * @param int $index
     * @return array
     */
    public function getServiceByIndex($index)
    {
        $result = $this->client->GetServiceByIndex(
            new \SoapParam($index, 'NewIndex'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setServiceByIndex
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewIndex (ui4)
     * in: NewEnabled (boolean)
     * in: NewName (string)
     * in: NewScheme (string)
     * in: NewPort (ui4)
     * in: NewURLPath (string)
     * in: NewType (string)
     * in: NewIPv4Address (string)
     * in: NewIPv6Address (string)
     * in: NewIPv6InterfaceID (string)
     * in: NewMACAddress (string)
     * in: NewHostName (string)
     *
     * @param int $index
     * @param bool $enabled
     * @param string $name
     * @param string $scheme
     * @param int $port
     * @param string $uRLPath
     * @param string $type
     * @param string $iPv4Address
     * @param string $iPv6Address
     * @param string $iPv6InterfaceID
     * @param string $mACAddress
     * @param string $hostName
     * @return void
     */
    public function setServiceByIndex($index, $enabled, $name, $scheme, $port, $uRLPath, $type, $iPv4Address, $iPv6Address, $iPv6InterfaceID, $mACAddress, $hostName)
    {
        $result = $this->client->SetServiceByIndex(
            new \SoapParam($index, 'NewIndex'),
            new \SoapParam($enabled, 'NewEnabled'),
            new \SoapParam($name, 'NewName'),
            new \SoapParam($scheme, 'NewScheme'),
            new \SoapParam($port, 'NewPort'),
            new \SoapParam($uRLPath, 'NewURLPath'),
            new \SoapParam($type, 'NewType'),
            new \SoapParam($iPv4Address, 'NewIPv4Address'),
            new \SoapParam($iPv6Address, 'NewIPv6Address'),
            new \SoapParam($iPv6InterfaceID, 'NewIPv6InterfaceID'),
            new \SoapParam($mACAddress, 'NewMACAddress'),
            new \SoapParam($hostName, 'NewHostName'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * deleteServiceByIndex
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewIndex (ui4)
     *
     * @param int $index
     * @return void
     */
    public function deleteServiceByIndex($index)
    {
        $result = $this->client->DeleteServiceByIndex(
            new \SoapParam($index, 'NewIndex'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

}
