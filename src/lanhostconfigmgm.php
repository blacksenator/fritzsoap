<?php

namespace blacksenator\fritzsoap;

/**
* The class provides functions to read and manipulate
* data via TR-064 interface on FRITZ!Box router from AVM:
* according to:
* @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/lanhostconfigmgmSCPD.pdf
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

class lanhostconfigmgm extends fritzsoap
{
    /**
     * getInfo
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewDHCPServerConfigurable
     * out: NewDHCPRelay
     * out: NewMinAddress
     * out: NewMaxAddress
     * out: NewReservedAddresses
     * out: NewDHCPServerEnable
     * out: NewDNSServers
     * out: NewDomainName
     * out: NewIPRouters
     * out: NewSubnetMask
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
     * setDHCPServerEnable
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewDHCPServerEnable
     *
     */
    public function setDHCPServerEnable()
    {
        $result = $this->client->SetDHCPServerEnable();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * setIPInterface
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewEnable
     * in: NewIPAddress
     * in: NewSubnetMask
     * in: NewIPAddressingType
     *
     */
    public function setIPInterface()
    {
        $result = $this->client->SetIPInterface();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * getAddressRange
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewMinAddress
     * out: NewMaxAddress
     *
     */
    public function getAddressRange()
    {
        $result = $this->client->GetAddressRange();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * setAddressRange
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewMinAddress
     * in: NewMaxAddress
     *
     */
    public function setAddressRange()
    {
        $result = $this->client->SetAddressRange();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * getIPRoutersList
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewIPRouters
     *
     */
    public function getIPRoutersList()
    {
        $result = $this->client->GetIPRoutersList();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * setIPRouter
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewIPRouters
     *
     */
    public function setIPRouter()
    {
        $result = $this->client->SetIPRouter();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * getSubnetMask
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewSubnetMask
     *
     */
    public function getSubnetMask()
    {
        $result = $this->client->GetSubnetMask();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * setSubnetMask
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewSubnetMask
     *
     */
    public function setSubnetMask()
    {
        $result = $this->client->SetSubnetMask();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * getDNSServers
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewDNSServers
     *
     */
    public function getDNSServers()
    {
        $result = $this->client->GetDNSServers();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * getIPInterfaceNumberOfEntries
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewIPInterfaceNumberOfEntries
     *
     */
    public function getIPInterfaceNumberOfEntries()
    {
        $result = $this->client->GetIPInterfaceNumberOfEntries();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

}
