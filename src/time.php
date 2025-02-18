<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides functions to read and manipulate data via SOAP interface
 * on FRITZ!Box router from AVM:
 *
 * @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/timeSCPD.pdf
 *
 * @author Volker Püschel <knuffy@anasco.de>
 * @copyright Volker Püschel 2019 - 2025
 * @license MIT
**/

use blacksenator\fritzsoap\fritzsoap;

class time extends fritzsoap
{
    const
        SERVICE_TYPE = 'urn:dslforum-org:service:Time:1',
        CONTROL_URL  = '/upnp/control/time';

    /**
     * getInfo
     *
     * get time data info
     *
     * out: NewNTPServer1 (string)
     * out: NewNTPServer2 (string)
     * out: NewCurrentLocalTime (dateTime)
     * out: NewLocalTimeZone (string)
     * out: NewLocalTimeZoneName (string)
     * out: NewDaylightSavingsUsed (boolean)
     * out: NewDaylightSavingsStart (dateTime)
     * out: NewDaylightSavingsEnd (dateTime)
     *
     * @return array
     */
    public function getInfo()
    {
        $result = $this->client->GetInfo();
        if ($this->errorHandling($result, 'Could not get time info from FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setNTPServers
     *
     * in: NewNTPServer1 (string)
     * in: NewNTPServer2 (string)
     *
     * @param string $nTPServer1
     * @param string $nTPServer2
     * @return void
     */
    public function setNTPServers($nTPServer1, $nTPServer2)
    {
        $result = $this->client->SetNTPServers(
            new \SoapParam($nTPServer1, 'NewNTPServer1'),
            new \SoapParam($nTPServer2, 'NewNTPServer2'));
        $this->errorHandling($result, 'Could not set  NTP server at FRITZ!Box');
    }
}
