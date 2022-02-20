<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides functions to read and manipulate
 * data via TR-064 interface on FRITZ!Box router from AVM.
 *
 * @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/x_tam.pdf
 * *
 * @author Volker Püschel <knuffy@anasco.de>
 * @copyright Volker Püschel 2022
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
        if ($this->errorHandling($result, 'Could not get tam info from FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setEnable
     *
     * enable or disable a given tam by index
     * Index starts with 0!
     * The boolean value should be set as >0< or >1<.
     * A >true< or >false< will cause no error, but
     * You can not enable with >true< but disable with
     * >false<!
     * That's why it's intercepted in the coding.
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
        $enable = $enable ? 1 : 0;
        $result = $this->client->SetEnable(
            new \SoapParam($index, 'NewIndex'),
            new \SoapParam($enable, 'NewEnable'));
        $bStr = $enable ? "enable" : "disable";
        $message = sprintf('Could not %s tam #%s on FRITZ!Box', $bStr, $index);
        if ($this->errorHandling($result, $message)) {
            return;
        }

        return $result;
    }

    /**
     * getMessageList
     *
     * Returns a XML with list of callers on the
     * answering machine:
     * <?xml version="1.0" encoding="UTF-8"?>
     * <Root>
     *     <Message>
     *         <Index/>
     *         <Tam/>
     *         <Called/>
     *         <Date/>
     *         <Duration/>
     *         <Inbook/>
     *         <Name/>
     *         <New/>
     *         <Number/>
     *         <Path/>
     *    </Message>
     * </Root>
     *
     * in: NewIndex (ui2)
     * out: NewURL (string)
     *
     * @param int $index
     * @return SimpleXMLElemnt
     */
    public function getMessageList($index)
    {
        $result = $this->client->GetMessageList(
            new \SoapParam($index, 'NewIndex'));
        if ($this->errorHandling($result, 'Could not get message list from FRITZ!Box')) {
            return;
        }

        return simplexml_load_file($result);
    }

    /**
     * markMessage
     *
     * marking a designated message on a given
     * answering machine as read or unread
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
        $markedAsRead = $markedAsRead ? 1 : 0;
        $result = $this->client->MarkMessage(
            new \SoapParam($index, 'NewIndex'),
            new \SoapParam($messageIndex, 'NewMessageIndex'),
            new \SoapParam($markedAsRead, 'NewMarkedAsRead'));
        $bStr = $markedAsRead ? "read" : "unread";
        $message = sprintf('Could not mark message #%s as %s on answering machine #%s of FRITZ!Box', $messageIndex, $bStr, $index);
        if ($this->errorHandling($result, $message)) {
            return;
        }

        return $result;
    }

    /**
     * deleteMessage
     *
     * delete a designated message from a given
     * answering machine
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
        $message = sprintf('Could not delete message #%s from answering machine #%s on FRITZ!Box', $messageIndex, $index);
        if ($this->errorHandling($result, $message)) {
            return;
        }

        return $result;
    }

    /**
     * getList
     *
     * returns a list of answering machines in XML format:
     * <List>
     *     <TAMRunning/>
     *     <Stick/>
     *     <Status/>
     *     <Capacity/>
     *     <Item>
     *         <Index/>
     *         <Display/>
     *         <Enable/>
     *         <Name/>
     *     </Item>
     * </List>
     *
     * out: NewTAMList (string)
     *
     * @return string
     */
    public function getList()
    {
        $result = $this->client->GetList();
        if ($this->errorHandling($result, 'Could not get tam list from FRITZ!Box')) {
            return;
        }

        return $result;
    }
}
