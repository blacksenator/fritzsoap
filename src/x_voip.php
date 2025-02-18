<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides functions to read and manipulate data via SOAP interface
 * on FRITZ!Box router from AVM:
 *
 * @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/x_voip-avm.pdf
 *
 * A lot of functions (actions) require as input argument an VoiPIndex. You can
 * figure out this data with x_AVM_DE_GetNumbers(): List->Item->Index
 *
 * In addition to the designated functions for each action, this class contains
 * further functions:
 * - getPhonePorts() extends x_AVM_DE_GetPhonePort()
 *
 * @author Volker Püschel <knuffy@anasco.de>
 * @copyright Volker Püschel 2019 - 2025
 * @license MIT
**/

use blacksenator\fritzsoap\fritzsoap;
use \SimpleXMLElement;

class x_voip extends fritzsoap
{
    const
        SERVICE_TYPE = 'urn:dslforum-org:service:X_VoIP:1',
        CONTROL_URL  = '/upnp/control/x_voip',
        MAX_PHONE_DEVICES = 20;                         // see: getPhonePorts()

    /**
     * getInfoEx
     *
     * returns the defaults for field definitions
     *
     * out: NewVoIPNumberMinChars (ui2)
     * out: NewVoIPNumberMaxChars (ui2)
     * out: NewVoIPNumberAllowedChars (string)
     * out: NewVoIPUsernameMinChars (ui2)
     * out: NewVoIPUsernameMaxChars (ui2)
     * out: NewVoIPUsernameAllowedChars (string)
     * out: NewVoIPPasswordMinChars (ui2)
     * out: NewVoIPPasswordMaxChars (ui2)
     * out: NewVoIPPasswordAllowedChars (string)
     * out: NewVoIPRegistrarMinChars (ui2)
     * out: NewVoIPRegistrarMaxChars (ui2)
     * out: NewVoIPRegistrarAllowedChars (string)
     * out: NewVoIPSTUNServerMinChars (ui2)
     * out: NewVoIPSTUNServerMaxChars (ui2)
     * out: NewVoIPSTUNServerAllowedChars (string)
     * out: NewX_AVM-DE_ClientUsernameMinChars (ui2)
     * out: NewX_AVM-DE_ClientUsernameMaxChars (ui2)
     * out: NewX_AVM-DE_ClientUsernameAllowedChars (string)
     * out: NewX_AVM-DE_ClientPasswordMinChars (ui2)
     * out: NewX_AVM-DE_ClientPasswordMaxChars (ui2)
     * out: NewX_AVM-DE_ClientPasswordAllowedChars (string)
     *
     * @return array
     */
    public function getInfoEx()
    {
        $result = $this->client->GetInfoEx();
        if ($this->errorHandling($result, 'Could not get extended infos from FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_AddVoIPAccount
     *
     * Adds another voip account. keep in mind the maximum of voip accounts:
     * getMaxVoIPNumbers()
     *
     * in: NewVoIPAccountIndex (ui2)
     * in: NewVoIPRegistrar (string)
     * in: NewVoIPNumber (string)
     * in: NewVoIPUsername (string)
     * in: NewVoIPPassword (string)
     * in: NewVoIPOutboundProxy (string)
     * in: NewVoIPSTUNServer (string)
     *
     * @param int $voIPAccountIndex
     * @param string $voIPRegistrar
     * @param string $voIPNumber
     * @param string $voIPUsername
     * @param string $voIPPassword
     * @param string $voIPOutboundProxy
     * @param string $voIPSTUNServer
     * @return void
     */
    public function x_AVM_DE_AddVoIPAccount($voIPAccountIndex, $voIPRegistrar, $voIPNumber, $voIPUsername, $voIPPassword, $voIPOutboundProxy, $voIPSTUNServer)
    {
        $result = $this->client->{'X_AVM-DE_AddVoIPAccount'}(
            new \SoapParam($voIPAccountIndex, 'NewVoIPAccountIndex'),
            new \SoapParam($voIPRegistrar, 'NewVoIPRegistrar'),
            new \SoapParam($voIPNumber, 'NewVoIPNumber'),
            new \SoapParam($voIPUsername, 'NewVoIPUsername'),
            new \SoapParam($voIPPassword, 'NewVoIPPassword'),
            new \SoapParam($voIPOutboundProxy, 'NewVoIPOutboundProxy'),
            new \SoapParam($voIPSTUNServer, 'NewVoIPSTUNServer'));
        $this->errorHandling($result, 'Could not ... from/to FRITZ!Box');
    }

    /**
     * x_AVM_DE_GetVoIPAccount
     *
     * return VoIP account settings
     *
     * in: NewVoIPAccountIndex (ui2)
     * out: NewVoIPRegistrar (string)
     * out: NewVoIPNumber (string)
     * out: NewVoIPUsername (string)
     * out: NewVoIPPassword (string)
     * out: NewVoIPOutboundProxy (string)
     * out: NewVoIPSTUNServer (string)
     *
     * @param int $voIPAccountIndex
     * @return array
     */
    public function x_AVM_DE_GetVoIPAccount($voIPAccountIndex)
    {
        $result = $this->client->{'X_AVM-DE_GetVoIPAccount'}(
            new \SoapParam($voIPAccountIndex, 'NewVoIPAccountIndex'));
        if ($this->errorHandling($result, sprintf('Could not get VoIP account %s from FRITZ!Box', $voIPAccountIndex))) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_DelVoIPAccount
     *
     * delete VoIP account
     *
     * in: NewVoIPAccountIndex (ui2)
     *
     * @param int $voIPAccountIndex
     * @return void
     */
    public function x_AVM_DE_DelVoIPAccount($voIPAccountIndex)
    {
        $result = $this->client->{'X_AVM-DE_DelVoIPAccount'}(
            new \SoapParam($voIPAccountIndex, 'NewVoIPAccountIndex'));
        $this->errorHandling($result, sprintf('Could not delete VoIP account %s from FRITZ!Box', $voIPAccountIndex));
    }

    /**
     * getInfo
     *
     * out: NewFaxT38Enable (boolean)
     * out: NewVoiceCoding (string)
     *
     * @return array
     */
    public function getInfo()
    {
        $result = $this->client->GetInfo();
        if ($this->errorHandling($result, 'Could not get info from FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setConfig
     *
     * in: NewFaxT38Enable (boolean)
     * in: NewVoiceCoding (string)
     *
     * @param bool $faxT38Enable
     * @param string $voiceCoding
     * @return void
     */
    public function setConfig($faxT38Enable, $voiceCoding)
    {
        $result = $this->client->SetConfig(
            new \SoapParam($faxT38Enable, 'NewFaxT38Enable'),
            new \SoapParam($voiceCoding, 'NewVoiceCoding'));
        $state = $this->boolToState($faxT38Enable);
        $message = sprintf('Could not %s FAX config %s at FRITZ!Box', $state, $voiceCoding);
        $this->errorHandling($result, $message);
    }

    /**
     * getMaxVoIPNumbers
     *
     * returns the maximum number of VoIP numbers (accounts)
     *
     * out: NewMaxVoIPNumbers (ui2)
     *
     * @return int
     */
    public function getMaxVoIPNumbers()
    {
        $result = $this->client->GetMaxVoIPNumbers();
        if ($this->errorHandling($result, 'Could not get maximum of VoIP numbers from FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getExistingVoIPNumbers
     *
     * return the number of VoIP numbers
     *
     * out: NewExistingVoIPNumbers (ui2)
     *
     * @return int
     */
    public function getExistingVoIPNumbers()
    {
        $result = $this->client->GetExistingVoIPNumbers();
        if ($this->errorHandling($result, 'Could not get number of VoIP numbers from FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetNumberOfClients
     *
     * returns number of clients
     *
     * out: NewX_AVM-DE_NumberOfClients (ui2)
     *
     * @return int
     */
    public function x_AVM_DE_GetNumberOfClients()
    {
        $result = $this->client->{'X_AVM-DE_GetNumberOfClients'}();
        if ($this->errorHandling($result, 'Could not get number of clients from FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetClient
     *
     * in: NewX_AVM-DE_ClientIndex (ui2)
     * out: NewX_AVM-DE_ClientUsername (string)
     * out: NewX_AVM-DE_ClientRegistrar (string)
     * out: NewX_AVM-DE_ClientRegistrarPort (ui2)
     * out: NewX_AVM-DE_PhoneName (string)
     * out: NewX_AVM-DE_OutGoingNumber (string)
     *
     * @param int $x_AVM_DE_ClientIndex
     * @return array
     */
    public function x_AVM_DE_GetClient($x_AVM_DE_ClientIndex)
    {
        $result = $this->client->{'X_AVM-DE_GetClient'}(
            new \SoapParam($x_AVM_DE_ClientIndex, 'NewX_AVM-DE_ClientIndex'));
        $message = sprintf('Could not get VoIP client %s from FRITZ!Box', $x_AVM_DE_ClientIndex);
        if ($this->errorHandling($result, $message)) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetClient2
     *
     * in: NewX_AVM-DE_ClientIndex (ui2)
     * out: NewX_AVM-DE_ClientUsername (string)
     * out: NewX_AVM-DE_ClientRegistrar (string)
     * out: NewX_AVM-DE_ClientRegistrarPort (ui2)
     * out: NewX_AVM-DE_PhoneName (string)
     * out: NewX_AVM-DE_ClientId (string)
     * out: NewX_AVM-DE_OutGoingNumber (string)
     * out: NewX_AVM-DE_InternalNumber (string)
     *
     * @param int $x_AVM_DE_ClientIndex
     * @return array
     */
    public function x_AVM_DE_GetClient2($x_AVM_DE_ClientIndex)
    {
        $result = $this->client->{'X_AVM-DE_GetClient2'}(
            new \SoapParam($x_AVM_DE_ClientIndex, 'NewX_AVM-DE_ClientIndex'));
        $message = sprintf('Could not get VoIP client %s from FRITZ!Box', $x_AVM_DE_ClientIndex);
        if ($this->errorHandling($result, $message)) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_SetClient
     *
     * in: NewX_AVM-DE_ClientIndex (ui2)
     * in: NewX_AVM-DE_ClientPassword (string)
     * in: NewX_AVM-DE_PhoneName (string)
     * in: NewX_AVM-DE_OutGoingNumber (string)
     *
     * @param int $x_AVM_DE_ClientIndex
     * @param string $x_AVM_DE_ClientPassword
     * @param string $x_AVM_DE_PhoneName
     * @param string $x_AVM_DE_OutGoingNumber
     * @return void
     */
    public function x_AVM_DE_SetClient($x_AVM_DE_ClientIndex, $x_AVM_DE_ClientPassword,
                                        $x_AVM_DE_PhoneName, $x_AVM_DE_OutGoingNumber)
    {
        $result = $this->client->{'X_AVM-DE_SetClient'}(
            new \SoapParam($x_AVM_DE_ClientIndex, 'NewX_AVM-DE_ClientIndex'),
            new \SoapParam($x_AVM_DE_ClientPassword, 'NewX_AVM-DE_ClientPassword'),
            new \SoapParam($x_AVM_DE_PhoneName, 'NewX_AVM-DE_PhoneName'),
            new \SoapParam($x_AVM_DE_OutGoingNumber, 'NewX_AVM-DE_OutGoingNumber'));
        $message = sprintf('Could not set VoIP client %s at FRITZ!Box', $x_AVM_DE_ClientIndex);
        $this->errorHandling($result, $message);
    }

    /**
     * x_AVM_DE_SetClient2
     *
     * in: NewX_AVM-DE_ClientIndex (ui2)
     * in: NewX_AVM-DE_ClientPassword (string)
     * in: NewX_AVM-DE_ClientId (string)
     * in: NewX_AVM-DE_PhoneName (string)
     * in: NewX_AVM-DE_OutGoingNumber (string)
     *
     * @param int $x_AVM_DE_ClientIndex
     * @param string $x_AVM_DE_ClientPassword
     * @param string $x_AVM_DE_ClientId
     * @param string $x_AVM_DE_PhoneName
     * @param string $x_AVM_DE_OutGoingNumber
     * @return void
     */
    public function x_AVM_DE_SetClient2($x_AVM_DE_ClientIndex, $x_AVM_DE_ClientPassword,
                                        $x_AVM_DE_ClientId, $x_AVM_DE_PhoneName,
                                        $x_AVM_DE_OutGoingNumber)
    {
        $result = $this->client->{'X_AVM-DE_SetClient2'}(
            new \SoapParam($x_AVM_DE_ClientIndex, 'NewX_AVM-DE_ClientIndex'),
            new \SoapParam($x_AVM_DE_ClientPassword, 'NewX_AVM-DE_ClientPassword'),
            new \SoapParam($x_AVM_DE_ClientId, 'NewX_AVM-DE_ClientId'),
            new \SoapParam($x_AVM_DE_PhoneName, 'NewX_AVM-DE_PhoneName'),
            new \SoapParam($x_AVM_DE_OutGoingNumber, 'NewX_AVM-DE_OutGoingNumber'));
        $message = sprintf('Could not set VoIP client %s at FRITZ!Box', $x_AVM_DE_ClientIndex);
        $this->errorHandling($result, $message);
    }

    /**
     * x_AVM_DE_GetClient3
     *
     * in: NewX_AVM-DE_ClientIndex (ui2)
     * out: NewX_AVM-DE_ClientUsername (string)
     * out: NewX_AVM-DE_ClientRegistrar (string)
     * out: NewX_AVM-DE_ClientRegistrarPort (ui2)
     * out: NewX_AVM-DE_PhoneName (string)
     * out: NewX_AVM-DE_ClientId (string)
     * out: NewX_AVM-DE_OutGoingNumber (string)
     * out: NewX_AVM-DE_InComingNumbers (string)
     * out: NewX_AVM-DE_ExternalRegistration (boolean)
     * out: NewX_AVM-DE_InternalNumber (string)
     * out: NewX_AVM-DE_DelayedCallNotification (boolean)
     *
     * @param int $x_AVM_DE_ClientIndex
     * @return array
     */
    public function x_AVM_DE_GetClient3($x_AVM_DE_ClientIndex)
    {
        $result = $this->client->{'X_AVM-DE_GetClient3'}(
            new \SoapParam($x_AVM_DE_ClientIndex, 'NewX_AVM-DE_ClientIndex'));
        $message = sprintf('Could not get VoIP client %s from FRITZ!Box', $x_AVM_DE_ClientIndex);
        if ($this->errorHandling($result, $message)) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetClientByClientId
     *
     * in: NewX_AVM-DE_ClientId (string)
     * out: NewX_AVM-DE_ClientId (string)
     * out: NewX_AVM-DE_ClientIndex (ui2)
     * out: NewX_AVM-DE_ClientUsername (string)
     * out: NewX_AVM-DE_ClientRegistrar (string)
     * out: NewX_AVM-DE_ClientRegistrarPort (ui2)
     * out: NewX_AVM-DE_PhoneName (string)
     * out: NewX_AVM-DE_OutGoingNumber (string)
     * out: NewX_AVM-DE_InComingNumbers (string)
     * out: NewX_AVM-DE_ExternalRegistration (boolean)
     * out: NewX_AVM-DE_InternalNumber (string)
     * out: NewX_AVM-DE_DelayedCallNotification (boolean)
     *
     * @param string $x_AVM_DE_ClientId
     * @return array
     */
    public function x_AVM_DE_GetClientByClientId($x_AVM_DE_ClientId)
    {
        $result = $this->client->{'X_AVM-DE_GetClientByClientId'}(
            new \SoapParam($x_AVM_DE_ClientId, 'NewX_AVM-DE_ClientId'));
        $message = sprintf('Could not get VoIP client with ID %s from FRITZ!Box', $x_AVM_DE_ClientId);
        if ($this->errorHandling($result, $message)) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_SetClient3
     *
     * in: NewX_AVM-DE_ClientIndex (ui2)
     * in: NewX_AVM-DE_ClientPassword (string)
     * in: NewX_AVM-DE_ClientId (string)
     * in: NewX_AVM-DE_PhoneName (string)
     * in: NewX_AVM-DE_OutGoingNumber (string)
     * in: NewX_AVM-DE_InComingNumbers (string)
     * in: NewX_AVM-DE_ExternalRegistration (boolean)
     *
     * @param int $x_AVM_DE_ClientIndex
     * @param string $x_AVM_DE_ClientPassword
     * @param string $x_AVM_DE_ClientId
     * @param string $x_AVM_DE_PhoneName
     * @param string $x_AVM_DE_OutGoingNumber
     * @param string $x_AVM_DE_InComingNumbers
     * @param bool $x_AVM_DE_ExternalRegistration
     * @return void
     */
    public function x_AVM_DE_SetClient3($x_AVM_DE_ClientIndex, $x_AVM_DE_ClientPassword,
                                        $x_AVM_DE_ClientId, $x_AVM_DE_PhoneName,
                                        $x_AVM_DE_OutGoingNumber, $x_AVM_DE_InComingNumbers,
                                        $x_AVM_DE_ExternalRegistration)
    {
        $result = $this->client->{'X_AVM-DE_SetClient3'}(
            new \SoapParam($x_AVM_DE_ClientIndex, 'NewX_AVM-DE_ClientIndex'),
            new \SoapParam($x_AVM_DE_ClientPassword, 'NewX_AVM-DE_ClientPassword'),
            new \SoapParam($x_AVM_DE_ClientId, 'NewX_AVM-DE_ClientId'),
            new \SoapParam($x_AVM_DE_PhoneName, 'NewX_AVM-DE_PhoneName'),
            new \SoapParam($x_AVM_DE_OutGoingNumber, 'NewX_AVM-DE_OutGoingNumber'),
            new \SoapParam($x_AVM_DE_InComingNumbers, 'NewX_AVM-DE_InComingNumbers'),
            new \SoapParam($x_AVM_DE_ExternalRegistration, 'NewX_AVM-DE_ExternalRegistration'));
        $message = sprintf('Could not set VoIP client with index %s at FRITZ!Box', $x_AVM_DE_ClientIndex);
        $this->errorHandling($result, $message);
    }

    /**
     * x_AVM_DE_SetClient4
     *
     * in: NewX_AVM-DE_ClientIndex (ui2)
     * in: NewX_AVM-DE_ClientPassword (string)
     * in: NewX_AVM-DE_ClientUsername (string)
     * in: NewX_AVM-DE_PhoneName (string)
     * in: NewX_AVM-DE_ClientId (string)
     * in: NewX_AVM-DE_OutGoingNumber (string)
     * in: NewX_AVM-DE_InComingNumbers (string)
     * out: NewX_AVM-DE_InternalNumber (string)
     *
     * @param int $x_AVM_DE_ClientIndex
     * @param string $x_AVM_DE_ClientPassword
     * @param string $x_AVM_DE_ClientUsername
     * @param string $x_AVM_DE_PhoneName
     * @param string $x_AVM_DE_ClientId
     * @param string $x_AVM_DE_OutGoingNumber
     * @param string $x_AVM_DE_InComingNumbers
     * @return string
     */
    public function x_AVM_DE_SetClient4($x_AVM_DE_ClientIndex, $x_AVM_DE_ClientPassword,
                                        $x_AVM_DE_ClientUsername, $x_AVM_DE_PhoneName,
                                        $x_AVM_DE_ClientId, $x_AVM_DE_OutGoingNumber,
                                        $x_AVM_DE_InComingNumbers)
    {
        $result = $this->client->{'X_AVM-DE_SetClient4'}(
            new \SoapParam($x_AVM_DE_ClientIndex, 'NewX_AVM-DE_ClientIndex'),
            new \SoapParam($x_AVM_DE_ClientPassword, 'NewX_AVM-DE_ClientPassword'),
            new \SoapParam($x_AVM_DE_ClientUsername, 'NewX_AVM-DE_ClientUsername'),
            new \SoapParam($x_AVM_DE_PhoneName, 'NewX_AVM-DE_PhoneName'),
            new \SoapParam($x_AVM_DE_ClientId, 'NewX_AVM-DE_ClientId'),
            new \SoapParam($x_AVM_DE_OutGoingNumber, 'NewX_AVM-DE_OutGoingNumber'),
            new \SoapParam($x_AVM_DE_InComingNumbers, 'NewX_AVM-DE_InComingNumbers'));
        $message = sprintf('Could not set VoIP client with index %s at FRITZ!Box', $x_AVM_DE_ClientIndex);
        if ($this->errorHandling($result, $message)) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetClients
     *
     * get phone clients
     *
     * out: NewX_AVM-DE_ClientList (string)
     *
     * @return string
     */
    public function x_AVM_DE_GetClients()
    {
        $result = $this->client->{'X_AVM-DE_GetClients'}();
        if ($this->errorHandling($result, 'Could not get phone clients from FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetNumberOfNumbers
     *
     * returns the number of own phone numbers
     *
     * out: NewNumberOfNumbers (ui4)
     *
     * @return int
     */
    public function x_AVM_DE_GetNumberOfNumbers()
    {
        $result = $this->client->{'X_AVM-DE_GetNumberOfNumbers'}();
        if ($this->errorHandling($result, 'Could not get number of phone numbers from FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetNumbers
     *
     * get a XML list of your telephone numbers (MSN):
     * <?xml version="1.0"?>
     * <List>
     *     <Item>
     *         <Number/>
     *         <Type/>
     *         <Index/>
     *         <Name/>
     *     </Item>
     * </List>
     *
     * out: NewNumberList (string)
     *
     * @return SimpleXMLElement
     */
    public function x_AVM_DE_GetNumbers()
    {
        $result = $this->client->{'X_AVM-DE_GetNumbers'}();
        if ($this->errorHandling($result, 'Could not list phone numbers from FRITZ!Box')) {
            return;
        }

        return new \SimpleXMLElement($result);
    }

    /**
     * x_AVM_DE_DeleteClient
     *
     * in: NewX_AVM-DE_ClientIndex (ui2)
     *
     * @param int $x_AVM_DE_ClientIndex
     * @return void
     */
    public function x_AVM_DE_DeleteClient($x_AVM_DE_ClientIndex)
    {
        $result = $this->client->{'X_AVM-DE_DeleteClient'}(
            new \SoapParam($x_AVM_DE_ClientIndex, 'NewX_AVM-DE_ClientIndex'));
        $message = sprintf('Could not delete client %s at FRITZ!Box', $x_AVM_DE_ClientIndex);
        $this->errorHandling($result, $message);
    }

    /**
     * x_AVM_DE_DialGetConfig
     *
     * supplies the assigned telephony device to "click to dial" (Wählhilfe)
     * If "click to dial" was not activated return will be: "unconfigured"
     * Otherwise the return string consists of "[type]: [name]":
     * - [type] values are: FON1, FON2, ISDN, DECT
     * - [name] is the name of your telephony device (e.g. Hallway)
     * Example: "DECT: Hallway"
     * @see x_AVM_DE_GetPhonePort()
     *
     * out: NewX_AVM-DE_PhoneName (string)
     *
     * @return string
     */
    public function x_AVM_DE_DialGetConfig()
    {
        $result = $this->client->{'X_AVM-DE_DialGetConfig'}();
        if ($this->errorHandling($result, 'Could not read the telephone device from FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_DialSetConfig
     *
     * Assigning the telephony device to "click to dial" (Wählhilfe). If "click
     * to dial" was not activated, it will be activated with the assignment or
     * deactivated with an empty string ('').
     *
     * The input string must consists of "[type]: [name]":
     * - [type] values are: FON1, FON2, ISDN, DECT
     * - [name] is the name of your telephony device (e.g. Hallway)
     * Example: "DECT: Hallway"
     * An invalid combination will cause a 402 error

     * @see x_AVM_DE_GetPhonePort() / x_AVM_DE_DialGetConfig()
     *
     * in: NewX_AVM-DE_PhoneName (string)
     *
     * @param string $x_AVM_DE_PhoneName
     * @return void
     */
    public function x_AVM_DE_DialSetConfig($x_AVM_DE_PhoneName)
    {
        $result = $this->client->{'X_AVM-DE_DialSetConfig'}(
            new \SoapParam($x_AVM_DE_PhoneName, 'NewX_AVM-DE_PhoneName'));
        $this->errorHandling($result, 'Could not set telephony device as "click to dial" at FRITZ!Box');
    }

    /**
     * x_AVM_DE_DialNumber
     *
     * Dial a number. Outgoing calls, internal numbers ('*[n]') and keyboard
     * codes are supported.
     * Precondition: you must activate a telephony device to "click to dial"
     * (Wählhilfe) otherwise this will cause a 501 error
     *
     * @see: x_AVM_DE_DialSetConfig
     *
     * @param string $phoneNumber
     * @return void
     */
    public function x_AVM_DE_DialNumber($phoneNumber)
    {
        $result = $this->client->{'X_AVM-DE_DialNumber'}(
            new \SoapParam($phoneNumber, 'NewX_AVM-DE_PhoneNumber'));
        $this->errorHandling($result, sprintf("Could not dial the number %s", $phoneNumber));
    }

    /**
     * x_AVM_DE_DialHangup
     *
     * Disconnect the dialling process
     *
     * @see: x_AVM_DE_DialSetConfig
     * @see: x_AVM_DE_DialNumber
     *
     * @return void
     */
    public function x_AVM_DE_DialHangup()
    {
        $result = $this->client->{'X_AVM-DE_DialHangup'}();
        $this->errorHandling($result, 'Could not hang up current dial on FRITZ!Box');
    }

    /**
     * x_AVM_DE_GetPhonePort
     *
     * return the phone device (e.g.: "DECT: Kitchen")
     *
     * There is no action (function) to determine the number of devices. The
     * Index starts with 1! An index greater than the count will cause a 713
     * error
     *
     * @see alternative additional function getPhonePorts()
     *
     * in: NewIndex (ui2) 1..n
     * out: NewX_AVM-DE_PhoneName (string)
     *
     * @param int $index
     * @param bool $error
     * @return string
     */
    public function x_AVM_DE_GetPhonePort(int $index, bool $error = true)
    {
        $result = $this->client->{'X_AVM-DE_GetPhonePort'}(
            new \SoapParam($index, 'NewIndex'));
        if ($error) {
            $message = sprintf('Could not get phone device %s from FRITZ!Box', $index);
            if ($this->errorHandling($result, $message)) {
                return;
            }
        }

        return $result;
    }

    /**
     * x_AVM_DE_SetDelayedCallNotification
     *
     * in: NewX_AVM-DE_ClientIndex (ui2)
     * in: NewX_AVM-DE_DelayedCallNotification (boolean)
     *
     * @param int $x_AVM_DE_ClientIndex
     * @param bool $x_AVM_DE_DelayedCallNotification
     * @return void
     */
    public function x_AVM_DE_SetDelayedCallNotification($x_AVM_DE_ClientIndex,
                                                        $x_AVM_DE_DelayedCallNotification)
    {
        $result = $this->client->{'X_AVM-DE_SetDelayedCallNotification'}(
            new \SoapParam($x_AVM_DE_ClientIndex, 'NewX_AVM-DE_ClientIndex'),
            new \SoapParam($x_AVM_DE_DelayedCallNotification, 'NewX_AVM-DE_DelayedCallNotification'));
        $message = sprintf('Could not set delayed call notification at FRITZ!Box');
        $this->errorHandling($result, $message);
    }

    /**
     * getVoIPCommonCountryCode
     *
     * returns country code setting (e.g. 0049)
     *
     * out: NewVoIPCountryCode (string)
     *
     * @return string
     */
    public function getVoIPCommonCountryCode()
    {
        $result = $this->client->GetVoIPCommonCountryCode();
        if ($this->errorHandling($result, 'Could not get country code from FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetVoIPCommonCountryCode
     *
     * returns country code number (e.g. "49") and its prefix (e.g. "00")
     *
     * out: NewX_AVM-DE_LKZ (string)
     * out: NewX_AVM-DE_LKZPrefix (string)
     *
     * @return array
     */
    public function x_AVM_DE_GetVoIPCommonCountryCode()
    {
        $result = $this->client->{'X_AVM-DE_GetVoIPCommonCountryCode'}();
        if ($this->errorHandling($result, 'Could not get country code from FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setVoIPCommonCountryCode
     *
     * @see getVoIPCommonCountryCode()
     *
     * in: NewVoIPCountryCode (string)
     *
     * @param string $voIPCountryCode
     * @return void
     */
    public function setVoIPCommonCountryCode($voIPCountryCode)
    {
        $result = $this->client->SetVoIPCommonCountryCode(
            new \SoapParam($voIPCountryCode, 'NewVoIPCountryCode'));
        $message = sprintf('Could not set country code %s at FRITZ!Box', $voIPCountryCode);
        $this->errorHandling($result, $message);
    }

    /**
     * x_AVM_DE_SetVoIPCommonCountryCode
     *
     * @see x_AVM_DE_GetVoIPCommonCountryCode()
     *
     * in: NewX_AVM-DE_LKZ (string)
     * in: NewX_AVM-DE_LKZPrefix (string)
     *
     * @param string $x_AVM_DE_LKZ
     * @param string $x_AVM_DE_LKZPrefix
     * @return void
     */
    public function x_AVM_DE_SetVoIPCommonCountryCode($x_AVM_DE_LKZ, $x_AVM_DE_LKZPrefix)
    {
        $result = $this->client->{'X_AVM-DE_SetVoIPCommonCountryCode'}(
            new \SoapParam($x_AVM_DE_LKZ, 'NewX_AVM-DE_LKZ'),
            new \SoapParam($x_AVM_DE_LKZPrefix, 'NewX_AVM-DE_LKZPrefix'));
        $message = sprintf('Could not set country code %s %s at FRITZ!Box', $x_AVM_DE_LKZ, $x_AVM_DE_LKZPrefix);
        $this->errorHandling($result, $message);
        }

    /**
     * getVoIPEnableCountryCode
     *
     * return status of country code settings as a 0 or 1. The Index starts with
     * 0! An index greater than the number of numbers will cause a 713 error
     *
     * in: NewVoIPAccountIndex (ui2)
     * out: NewVoIPEnableCountryCode (boolean)
     *
     * @param int $voIPAccountIndex
     * @return bool
     */
    public function getVoIPEnableCountryCode($voIPAccountIndex)
    {
        $result = $this->client->GetVoIPEnableCountryCode(
            new \SoapParam($voIPAccountIndex, 'NewVoIPAccountIndex'));
        $message = sprintf('Could not get country code status of number %s from FRITZ!Box', $voIPAccountIndex);
        if ($this->errorHandling($result, $message)) {
            return;
        }

        return $result;
    }

    /**
     * setVoIPEnableCountryCode
     *
     * in: NewVoIPAccountIndex (ui2)
     * in: NewVoIPEnableCountryCode (boolean)
     *
     * @param int $voIPAccountIndex
     * @param bool $voIPEnableCountryCode
     * @return void
     */
    public function setVoIPEnableCountryCode($voIPAccountIndex, $voIPEnableCountryCode)
    {
        $result = $this->client->SetVoIPEnableCountryCode(
            new \SoapParam($voIPAccountIndex, 'NewVoIPAccountIndex'),
            new \SoapParam($voIPEnableCountryCode, 'NewVoIPEnableCountryCode'));
        $state = $this->boolToState($voIPEnableCountryCode);
        $message = sprintf('Could not %s country code with index %s at FRITZ!Box', $state, $voIPAccountIndex);
        $this->errorHandling($result, $message);
    }

    /**
     * getVoIPCommonAreaCode
     *
     * returns area code (e.g. "030")
     *
     * out: NewVoIPAreaCode (string)
     *
     * @return string
     */
    public function getVoIPCommonAreaCode()
    {
        $result = $this->client->GetVoIPCommonAreaCode();
        if ($this->errorHandling($result, 'Could not get area code from FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetVoIPCommonAreaCode
     *
     * returns area code number (e.g. "30") and its prefix (e.g. "0")
     *
     * out: NewX_AVM-DE_OKZ (string)
     * out: NewX_AVM-DE_OKZPrefix (string)
     *
     * @return array
     */
    public function x_AVM_DE_GetVoIPCommonAreaCode()
    {
        $result = $this->client->{'X_AVM-DE_GetVoIPCommonAreaCode'}();
        if ($this->errorHandling($result, 'Could not get area code from FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setVoIPCommonAreaCode
     *
     * @see getVoIPCommonAreaCode
     *
     * in: NewVoIPAreaCode (string)
     *
     * @param string $voIPAreaCode
     * @return void
     */
    public function setVoIPCommonAreaCode($voIPAreaCode)
    {
        $result = $this->client->SetVoIPCommonAreaCode(
            new \SoapParam($voIPAreaCode, 'NewVoIPAreaCode'));
        $message = sprintf('Could not set area code %s at FRITZ!Box', $voIPAreaCode);
        $this->errorHandling($result, $message);
    }

    /**
     * x_AVM_DE_SetVoIPCommonAreaCode
     *
     * @see x_AVM_DE_GetVoIPCommonAreaCode()
     *
     * in: NewX_AVM-DE_OKZ (string)
     * in: NewX_AVM-DE_OKZPrefix (string)
     *
     * @param string $x_AVM_DE_OKZ
     * @param string $x_AVM_DE_OKZPrefix
     * @return void
     */
    public function x_AVM_DE_SetVoIPCommonAreaCode($x_AVM_DE_OKZ, $x_AVM_DE_OKZPrefix)
    {
        $result = $this->client->{'X_AVM-DE_SetVoIPCommonAreaCode'}(
            new \SoapParam($x_AVM_DE_OKZ, 'NewX_AVM-DE_OKZ'),
            new \SoapParam($x_AVM_DE_OKZPrefix, 'NewX_AVM-DE_OKZPrefix'));
        $this->errorHandling($result, 'Could not set area code at FRITZ!Box');
    }

    /**
     * getVoIPEnableAreaCode
     *
     * return status of area code settings as a 0 or 1. The Index starts with 0!
     * An index greater than the number of numbers will cause a 713 error.
     *
     * in: NewVoIPAccountIndex (ui2)
     * out: NewVoIPEnableAreaCode (boolean)
     *
     * @param int $voIPAccountIndex
     * @return bool
     */
    public function getVoIPEnableAreaCode($voIPAccountIndex)
    {
        $result = $this->client->GetVoIPEnableAreaCode(
            new \SoapParam($voIPAccountIndex, 'NewVoIPAccountIndex'));
        $message = sprintf('Could not get area code status with index %s from FRITZ!Box', $voIPAccountIndex);
        if ($this->errorHandling($result, $message)) {
            return;
        }

        return $result;
    }

    /**
     * setVoIPEnableAreaCode
     *
     * The Index starts with 0! An index greater than the number of numbers will
     * cause a 713 error.
     *
     * in: NewVoIPAccountIndex (ui2)
     * in: NewVoIPEnableAreaCode (boolean)
     *
     * @param int $voIPAccountIndex
     * @param bool $voIPEnableAreaCode
     * @return void
     */
    public function setVoIPEnableAreaCode($voIPAccountIndex, $voIPEnableAreaCode)
    {
        $result = $this->client->SetVoIPEnableAreaCode(
            new \SoapParam($voIPAccountIndex, 'NewVoIPAccountIndex'),
            new \SoapParam($voIPEnableAreaCode, 'NewVoIPEnableAreaCode'));
        $state = $this->boolToState($voIPEnableAreaCode);
        $message = sprintf('Could not %s area code with index %s on FRITZ!Box', $state, $voIPAccountIndex);
        $this->errorHandling($result, $message);
    }

    /**
     * x_AVM_DE_GetAlarmClock
     *
     * returns alarm clock settings. The Index starts with 0! An index greater
     * than 2 will cause a 714 error.
     *
     * in: NewIndex (ui2)
     * out: NewX_AVM-DE_AlarmClockEnable (boolean)
     * out: NewX_AVM-DE_AlarmClockName (string)
     * out: NewX_AVM-DE_AlarmClockTime (string)
     * out: NewX_AVM-DE_AlarmClockWeekdays (string)
     * out: NewX_AVM-DE_AlarmClockPhoneName (string)
     *
     * @param int $index
     * @return array
     */
    public function x_AVM_DE_GetAlarmClock($index)
    {
        $result = $this->client->{'X_AVM-DE_GetAlarmClock'}(
            new \SoapParam($index, 'NewIndex'));
        $message = sprintf('Could not get settings of alarm clock %s from FRITZ!Box', $index);
        if ($this->errorHandling($result, $message)) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_SetAlarmClockEnable
     *
     * enable or disable a n alarm clock
     *
     * The Index starts with 0! An index greater than 2 will cause a 714 error.
     * The boolean value must be set as >0< or >1<. A >true< or >false< will
     * cause a 402 error. That's why it's intercepted in the coding.
     *
     * in: NewIndex (ui2)
     * in: NewX_AVM-DE_AlarmClockEnable (boolean)
     *
     * @param int $index
     * @param bool $x_AVM_DE_AlarmClockEnable
     * @return void
     */
    public function x_AVM_DE_SetAlarmClockEnable($index, $x_AVM_DE_AlarmClockEnable)
    {
        $x_AVM_DE_AlarmClockEnable = $x_AVM_DE_AlarmClockEnable ? 1 : 0;
        $result = $this->client->{'X_AVM-DE_SetAlarmClockEnable'}(
            new \SoapParam($index, 'NewIndex'),
            new \SoapParam($x_AVM_DE_AlarmClockEnable, 'NewX_AVM-DE_AlarmClockEnable'));
        $state = $this->boolToState($x_AVM_DE_AlarmClockEnable);
        $message = sprintf('Could not %s alarm clock %s on FRITZ!Box', $state, $index);
        $this->errorHandling($result, $message);
    }

    /**
     * x_AVM_DE_GetNumberOfAlarmClocks
     *
     * returns the number of alarm clocks regardless if they are activated or not
     * As far as I Know there are always three alarm clocks available - so
     * therefore this function makes no sense!
     *
     * out: NewX_AVM-DE_NumberOfAlarmClocks (ui2)
     *
     * @return int
     */
    public function x_AVM_DE_GetNumberOfAlarmClocks()
    {
        $result = $this->client->{'X_AVM-DE_GetNumberOfAlarmClocks'}();
        if ($this->errorHandling($result, 'Could not get number of alarm clocks from FRITZ!Box')) {
            return;
        }

        return $result;
    }

    // +++ Additional functions not directly related to an action +++

    /**
     * Returns an array with the installed telephony devices
     * Example:
     *    [1] => FON1: Tor
     *    [2] => ISDN: ISDN/DECT Rundruf
     *    [3] => ISDN: ISDN-Telefonanlage
     *    [4] => DECT: Lager
     *
     * According to AVM documentation 20 devices could be connected:
     * - 6x DECT
     * - 10x IP
     * - 3x FON
     * - 1x S0
     *
     * see: https://avm.de/service/wissensdatenbank/dok/FRITZ-Box-7590/1634_Anzahl-Telefonie-und-DECT-Gerate-die-mit-FRITZ-Box-verwendet-werden-konnen/
     *
     * @return array
     */
    public function getPhonePorts()
    {
        $phonePorts = [];
        for ($i = 1; $i <= self::MAX_PHONE_DEVICES; $i++) {
            $phonePort = $this->x_AVM_DE_GetPhonePort($i, false);
            if (!is_soap_fault($phonePort)) {
                $phonePorts[$i] = $phonePort;
            } else {
                break;          // interrupts loop with first appearing soapfault
            }
        }

        return $phonePorts;
    }
}
