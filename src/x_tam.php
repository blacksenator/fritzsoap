<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides functions to read and manipulate
 * data via TR-064 interface on FRITZ!Box router from AVM.
 *
 * @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/x_tam.pdf
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

class x_tam extends fritzsoap
{
    const
        SERVICE_TYPE = 'urn:dslforum-org:service:X_AVM-DE_TAM:1',
        CONTROL_URL  = '/upnp/control/x_tam';

    /**
     * getInfo
     *
     * number of answering machine [0..n]
     *
     * out: NewEnable (boolean)
     * out: NewName (string)
     * out: NewTAMRunning (boolean)
     * out: NewStick (ui2)
     * out: NewStatus (ui2)
     * out: NewCapacity (ui4)
     * out: NewMode (string)
     * out: NewRingSeconds (ui2)
     * out: NewPhoneNumbers (string)
     *
     * @param int $index
     * @return array
     */
    public function getInfo($index)
    {
        $result = $this->client->GetInfo(
            new \SoapParam($index, 'NewIndex'));
        if ($this->errorHandling($result, 'Could not get info from FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setEnable
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewIndex (ui2)
     * in: NewEnable (boolean)
     *
     * @param int $index
     * @param bool $enable
     * @return void
     */
    public function setEnable($index, $enable)
    {
        $result = $this->client->SetEnable(
            new \SoapParam($index, 'NewIndex'),
            new \SoapParam($enable, 'NewEnable'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getMessageList
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewIndex (ui2)
     * out: NewURL (string)
     *
     * @param int $index
     * @return string
     */
    public function getMessageList($index)
    {
        $result = $this->client->GetMessageList(
            new \SoapParam($index, 'NewIndex'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * markMessage
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewIndex (ui2)
     * in: NewMessageIndex (ui2)
     * in: NewMarkedAsRead (boolean)
     *
     * @param int $index
     * @param int $messageIndex
     * @param bool $markedAsRead
     * @return void
     */
    public function markMessage($index, $messageIndex, $markedAsRead)
    {
        $result = $this->client->MarkMessage(
            new \SoapParam($index, 'NewIndex'),
            new \SoapParam($messageIndex, 'NewMessageIndex'),
            new \SoapParam($markedAsRead, 'NewMarkedAsRead'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * deleteMessage
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewIndex (ui2)
     * in: NewMessageIndex (ui2)
     *
     * @param int $index
     * @param int $messageIndex
     * @return void
     */
    public function deleteMessage($index, $messageIndex)
    {
        $result = $this->client->DeleteMessage(
            new \SoapParam($index, 'NewIndex'),
            new \SoapParam($messageIndex, 'NewMessageIndex'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getList
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewTAMList (string)
     *
     * @return string
     */
    public function getList()
    {
        $result = $this->client->GetList();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

}
