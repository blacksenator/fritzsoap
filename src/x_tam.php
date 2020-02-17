<?php

namespace blacksenator\fritzsoap;

/**
* The class provides functions to read and manipulate
* data via TR-064 interface on FRITZ!Box router from AVM:
* according to:
* @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/x_tam.pdf
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
* MOST FUNCTIONS ARE FRAMEWORKS AND HAVE TO BE CORRECTLY
* CODED, IF THEIR COMMENT WAS NOT OVERWRITTEN!
* +++++++++++++++++++++++++++++++++++++++++++++++++++++
*
* @author Volker Püschel <knuffy@anasco.de>
* @copyright Volker Püschel 2020
* @license MIT
**/

use blacksenator\fritzsoap\fritzsoap;

class x_tam extends fritzsoap
{
    /**
     * getInfo
     *
     * out: NewEnable
     * out: NewName
     * out: NewTAMRunning
     * out: NewStick
     * out: NewStatus
     * out: NewCapacity
     * out: NewMode
     * out: NewRingSeconds
     * out: NewPhoneNumbers
     *
     * @param int $index number of answering machine
     * @return array
     */
    public function getInfo(int $index): array
    {
        $result = $this->client->GetInfo(new \SoapParam($index, 'NewIndex'));
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not get info from FRITZ!Box", $this->errorCode, $this->errorText));
            return [];
        }

        return $result;
    }

    /**
     * setEnable
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewIndex
     * in: NewEnable
     *
     */
    public function setEnable()
    {
        $result = $this->client->SetEnable();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * getMessageList
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewIndex
     * out: NewURL
     *
     */
    public function getMessageList()
    {
        $result = $this->client->GetMessageList();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * markMessage
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewIndex
     * in: NewMessageIndex
     * in: NewMarkedAsRead
     *
     */
    public function markMessage()
    {
        $result = $this->client->MarkMessage();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * deleteMessage
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewIndex
     * in: NewMessageIndex
     *
     */
    public function deleteMessage()
    {
        $result = $this->client->DeleteMessage();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * getList
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewTAMList
     *
     */
    public function getList()
    {
        $result = $this->client->GetList();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

}
