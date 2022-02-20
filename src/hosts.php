<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides functions to read and manipulate
 * data via TR-064 interface on FRITZ!Box router from AVM:
 *
 * @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/hostsSCPD.pdf
 *
 * +++++++++++++++++++++ ATTENTION +++++++++++++++++++++
 * THIS FILE IS AUTOMATIC ASSEMBLED BUT PARTLY REVIEWED!
 * ALL FUNCTIONS ARE FRAMEWORKS AND HAVE TO BE CORRECTLY
 * CODED, IF THEIR COMMENT WAS NOT OVERWRITTEN!
 * +++++++++++++++++++++++++++++++++++++++++++++++++++++
 *
 * @author Volker Püschel <knuffy@anasco.de>
 * @copyright Volker Püschel 2019 - 2021
 * @license MIT
**/

use blacksenator\fritzsoap\fritzsoap;
use \SimpleXMLElement;

class hosts extends fritzsoap
{
    const
        SERVICE_TYPE = 'urn:dslforum-org:service:Hosts:1',
        CONTROL_URL  = '/upnp/control/hosts';

    /**
     * getHostNumberOfEntries
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewHostNumberOfEntries (ui2)
     *
     * @return int
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
     * in: NewMACAddress (string)
     * out: NewIPAddress (string)
     * out: NewAddressSource (string)
     * out: NewLeaseTimeRemaining (i4)
     * out: NewInterfaceType (string)
     * out: NewActive (boolean)
     * out: NewHostName (string)
     *
     * @param string $mACAddress
     * @return array
     */
    public function getSpecificHostEntry($mACAddress)
    {
        $result = $this->client->GetSpecificHostEntry(
            new \SoapParam($mACAddress, 'NewMACAddress'));
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
     * in: NewIndex (ui2)
     * out: NewIPAddress (string)
     * out: NewAddressSource (string)
     * out: NewLeaseTimeRemaining (i4)
     * out: NewMACAddress (string)
     * out: NewInterfaceType (string)
     * out: NewActive (boolean)
     * out: NewHostName (string)
     *
     * @param int $index
     * @return array
     */
    public function getGenericHostEntry($index)
    {
        $result = $this->client->GetGenericHostEntry(
            new \SoapParam($index, 'NewIndex'));
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
     * out: NewX_AVM-DE_ChangeCounter (ui4)
     *
     * @return int
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
     * in: NewMACAddress (string)
     * in: NewHostName (string)
     *
     * @param string $mACAddress
     * @param string $hostName
     * @return void
     */
    public function x_AVM_DE_SetHostNameByMACAddress($mACAddress, $hostName)
    {
        $result = $this->client->{'X_AVM-DE_SetHostNameByMACAddress'}(
            new \SoapParam($mACAddress, 'NewMACAddress'),
            new \SoapParam($hostName, 'NewHostName'));
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
     * in: NewMACAddress (string)
     * out: NewAutoWOLEnabled (boolean)
     *
     * @param string $mACAddress
     * @return bool
     */
    public function x_AVM_DE_GetAutoWakeOnLANByMACAddress($mACAddress)
    {
        $result = $this->client->{'X_AVM-DE_GetAutoWakeOnLANByMACAddress'}(
            new \SoapParam($mACAddress, 'NewMACAddress'));
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
     * in: NewMACAddress (string)
     * in: NewAutoWOLEnabled (boolean)
     *
     * @param string $mACAddress
     * @param bool $autoWOLEnabled
     * @return void
     */
    public function x_AVM_DE_SetAutoWakeOnLANByMACAddress($mACAddress, $autoWOLEnabled)
    {
        $result = $this->client->{'X_AVM-DE_SetAutoWakeOnLANByMACAddress'}(
            new \SoapParam($mACAddress, 'NewMACAddress'),
            new \SoapParam($autoWOLEnabled, 'NewAutoWOLEnabled'));
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
     * in: NewMACAddress (string)
     *
     * @param string $mACAddress
     * @return void
     */
    public function x_AVM_DE_WakeOnLANByMACAddress($mACAddress)
    {
        $result = $this->client->{'X_AVM-DE_WakeOnLANByMACAddress'}(
            new \SoapParam($mACAddress, 'NewMACAddress'));
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
     * in: NewIPAddress (string)
     * out: NewMACAddress (string)
     * out: NewActive (boolean)
     * out: NewHostName (string)
     * out: NewInterfaceType (string)
     * out: NewX_AVM-DE_Port (ui4)
     * out: NewX_AVM-DE_Speed (ui4)
     * out: NewX_AVM-DE_UpdateAvailable (boolean)
     * out: NewX_AVM-DE_UpdateSuccessful (string)
     * out: NewX_AVM-DE_InfoURL (string)
     * out: NewX_AVM-DE_Model (string)
     * out: NewX_AVM-DE_URL (string)
     *
     * @param string $iPAddress
     * @return array
     */
    public function x_AVM_DE_GetSpecificHostEntryByIP($iPAddress)
    {
        $result = $this->client->{'X_AVM-DE_GetSpecificHostEntryByIP'}(
            new \SoapParam($iPAddress, 'NewIPAddress'));
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
     * @return void
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
     * in: NewMACAddress (string)
     *
     * @param string $mACAddress
     * @return void
     */
    public function x_AVM_DE_HostDoUpdate($mACAddress)
    {
        $result = $this->client->{'X_AVM-DE_HostDoUpdate'}(
            new \SoapParam($mACAddress, 'NewMACAddress'));
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
     * out: NewX_AVM-DE_HostListPath (string)
     *
     * @return string
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
     * get a XML list of connected devices to the network
     * requires a client of 'hosts'
     *
     * @return SimpleXMLElement
     */
    public function x_AVM_DE_GetMeshListPath()
    {
        $result = $this->client->{'X_AVM-DE_GetMeshListPath'}();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }
        $meshListArray = json_decode(file_get_contents($this->fritzBoxURL . $result), true);
        $xml = new SimpleXMLElement('<?xml version="1.0"?><data></data>');

        return $this->arrayToXML($meshListArray, $xml);
    }

}
