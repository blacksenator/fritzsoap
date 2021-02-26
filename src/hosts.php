<?php

namespace blacksenator\fritzsoap;

/**
* The class provides functions to read and manipulate
* data via TR-064 interface on FRITZ!Box router from AVM:
* according to:
* @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/hostsSCPD.pdf
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
* THIS FILE IS AUTOMATIC ASSEMBLED BUT PARTLY REVIEWED!
* ALL FUNCTIONS ARE FRAMEWORKS AND HAVE TO BE CORRECTLY
* CODED, IF THEIR COMMENT WAS NOT OVERWRITTEN!
* +++++++++++++++++++++++++++++++++++++++++++++++++++++
*
* @author Volker Püschel <knuffy@anasco.de>
* @copyright Volker Püschel 2021
* @license MIT
**/

use blacksenator\fritzsoap\fritzsoap;
use \SimpleXMLElement;

class hosts extends fritzsoap
{
    /**
     * getHostNumberOfEntries
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewHostNumberOfEntries
     *
     */
    public function getHostNumberOfEntries()
    {
        $result = $this->client->GetHostNumberOfEntries();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getSpecificHostEntry
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewMACAddress
     * out: NewIPAddress
     * out: NewAddressSource
     * out: NewLeaseTimeRemaining
     * out: NewInterfaceType
     * out: NewActive
     * out: NewHostName
     *
     */
    public function getSpecificHostEntry()
    {
        $result = $this->client->GetSpecificHostEntry();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getGenericHostEntry
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewIndex
     * out: NewIPAddress
     * out: NewAddressSource
     * out: NewLeaseTimeRemaining
     * out: NewMACAddress
     * out: NewInterfaceType
     * out: NewActive
     * out: NewHostName
     *
     */
    public function getGenericHostEntry()
    {
        $result = $this->client->GetGenericHostEntry();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetChangeCounter
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewX_AVM-DE_ChangeCounter
     *
     */
    public function x_AVM_DE_GetChangeCounter()
    {
        $result = $this->client->{'X_AVM-DE_GetChangeCounter'}();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_SetHostNameByMACAddress
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewMACAddress
     * in: NewHostName
     *
     */
    public function x_AVM_DE_SetHostNameByMACAddress()
    {
        $result = $this->client->{'X_AVM-DE_SetHostNameByMACAddress'}();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetAutoWakeOnLANByMACAddress
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewMACAddress
     * out: NewAutoWOLEnabled
     *
     */
    public function x_AVM_DE_GetAutoWakeOnLANByMACAddress()
    {
        $result = $this->client->{'X_AVM-DE_GetAutoWakeOnLANByMACAddress'}();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_SetAutoWakeOnLANByMACAddress
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewMACAddress
     * in: NewAutoWOLEnabled
     *
     */
    public function x_AVM_DE_SetAutoWakeOnLANByMACAddress()
    {
        $result = $this->client->{'X_AVM-DE_SetAutoWakeOnLANByMACAddress'}();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_WakeOnLANByMACAddress
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewMACAddress
     *
     */
    public function x_AVM_DE_WakeOnLANByMACAddress()
    {
        $result = $this->client->{'X_AVM-DE_WakeOnLANByMACAddress'}();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetSpecificHostEntryByIP
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewIPAddress
     * out: NewMACAddress
     * out: NewActive
     * out: NewHostName
     * out: NewInterfaceType
     * out: NewX_AVM-DE_Port
     * out: NewX_AVM-DE_Speed
     * out: NewX_AVM-DE_UpdateAvailable
     * out: NewX_AVM-DE_UpdateSuccessful
     * out: NewX_AVM-DE_InfoURL
     * out: NewX_AVM-DE_Model
     * out: NewX_AVM-DE_URL
     *
     */
    public function x_AVM_DE_GetSpecificHostEntryByIP()
    {
        $result = $this->client->{'X_AVM-DE_GetSpecificHostEntryByIP'}();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_HostsCheckUpdate
     *
     * automatically generated; complete coding if necessary!
     *
     *
     */
    public function x_AVM_DE_HostsCheckUpdate()
    {
        $result = $this->client->{'X_AVM-DE_HostsCheckUpdate'}();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_HostDoUpdate
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewMACAddress
     *
     */
    public function x_AVM_DE_HostDoUpdate()
    {
        $result = $this->client->{'X_AVM-DE_HostDoUpdate'}();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetHostListPath
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewX_AVM-DE_HostListPath
     *
     */
    public function x_AVM_DE_GetHostListPath()
    {
        $result = $this->client->{'X_AVM-DE_GetHostListPath'}();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetMeshListPath
     *
     * out: NewX_AVM-DE_MeshListPath
     *
     * get a XML list of connected devices to the network
     * requires a client of 'hosts'
     *
     * @return SimpleXMLElement
     */
    public function x_AVM_DE_GetMeshListPath()
    {
        $result = $this->client->{'X_AVM-DE_GetMeshListPath'}();
        if ($this->errorHandling($result, 'Could not get mesh list from FRITZ!Box')) {
            return;
        }
        $meshListArray = json_decode(file_get_contents($this->serverAdress . $result), true);
        $xml = new SimpleXMLElement('<?xml version="1.0"?><data></data>');

        return $this->arrayToXML($meshListArray, $xml);
    }

}
