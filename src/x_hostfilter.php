<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides functions to read and manipulate data via SOAP interface
 * on FRITZ!Box router from AVM:
 *
 * @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/x_hostfilterSCPD.pdf
 * @see: https://en.avm.de/service/knowledge-base/dok/FRITZ-Box-7590/3408_Extending-the-online-time-permitted-in-the-parental-controls-with-tickets/
 *
 * @author Volker Püschel <knuffy@anasco.de>
 * @copyright Volker Püschel 2019 - 2025
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
     * returns a ticket from the list for parental controls and mark it similar
     * to the Button "share ticket" (where it is copied to the clipboard). If
     * you request more than unmarked tickets (max. 10) the return is a 714
     * error
     *
     * out: NewTicketID (string)
     *
     * @return string
     */
    public function markTicket()
    {
        $result = $this->client->MarkTicket();
        if ($this->errorHandling($result, 'Could not mark ticket at FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getTicketIDStatus
     *
     * returns the status >marked< or >unmarked< to a given ticket number.
     * Returns >invalid< if ticket number is outside of ticket list. If input
     * string is not equal 6 char or contains no numerics it cause a 402 error
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
        $message = sprintf('Could not get status of ticket %s from FRITZ!Box', $ticketID);
        if ($this->errorHandling($result, $message)) {
            return;
        }

        return $result;
    }

    /**
     * discardAllTickets
     *
     * resets ticket list
     *
     * @return void
     */
    public function discardAllTickets()
    {
        $result = $this->client->DiscardAllTickets();
        $this->errorHandling($result, 'Could not discard all tickets at FRITZ!Box');
    }

    /**
     * disallowWANAccessByIP
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
        $message = sprintf('Could not dissallow WAN access by IP %s at FRITZ!Box', $iPv4Address);
        $this->errorHandling($result, $message);
    }

    /**
     * getWANAccessByIP
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
        $message = sprintf('Could not get WAN access by IP %s from FRITZ!Box', $iPv4Address);
        if ($this->errorHandling($result, $message)) {
            return;
        }

        return $result;
    }
}
