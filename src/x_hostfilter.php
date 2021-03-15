<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides functions to read and manipulate
 * data via TR-064 interface on FRITZ!Box router from AVM:
 *
 * @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/x_hostfilterSCPD.pdf
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

class x_hostfilter extends fritzsoap
{
    const
        SERVICE_TYPE = 'urn:dslforum-org:service:X_AVM-DE_HostFilter:1',
        CONTROL_URL  = '/upnp/control/x_hostfilter';

    /**
     * markTicket
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewTicketID (string)
     *
     * @return string
     */
    public function markTicket()
    {
        $result = $this->client->MarkTicket();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getTicketIDStatus
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewTicketID (string)
     * out: NewTicketIDStatus (string)
     *
     * @param string $ticketID
     * @return string
     */
    public function getTicketIDStatus($ticketID)
    {
        $result = $this->client->GetTicketIDStatus(
            new \SoapParam($ticketID, 'NewTicketID'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * discardAllTickets
     *
     * automatically generated; complete coding if necessary!
     *
     * @return void
     */
    public function discardAllTickets()
    {
        $result = $this->client->DiscardAllTickets();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * disallowWANAccessByIP
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewIPv4Address (string)
     * in: NewDisallow (boolean)
     *
     * @param string $iPv4Address
     * @param bool $disallow
     * @return void
     */
    public function disallowWANAccessByIP($iPv4Address, $disallow)
    {
        $result = $this->client->DisallowWANAccessByIP(
            new \SoapParam($iPv4Address, 'NewIPv4Address'),
            new \SoapParam($disallow, 'NewDisallow'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getWANAccessByIP
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewIPv4Address (string)
     * out: NewDisallow (boolean)
     * out: NewWANAccess (string)
     *
     * @param string $iPv4Address
     * @return array
     */
    public function getWANAccessByIP($iPv4Address)
    {
        $result = $this->client->GetWANAccessByIP(
            new \SoapParam($iPv4Address, 'NewIPv4Address'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

}
