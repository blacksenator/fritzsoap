<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides functions to read and manipulate
 * data via TR-064 interface on FRITZ!Box router from AVM:
 * according to:
 * @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/timeSCPD.pdf
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

class time extends fritzsoap
{
    /**
     * getInfo
     *
     * automatically generated; complete coding if necessary!
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
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setNTPServers
     *
     * automatically generated; complete coding if necessary!
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
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

}
