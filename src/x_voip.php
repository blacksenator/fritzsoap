<?php

namespace blacksenator\fritzsoap;

/**
* The class provides functions to read and manipulate
* data via TR-064 interface on FRITZ!Box router from AVM:
* according to:
* @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/x_voip-avm.pdf
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
* @copyright Volker Püschel 2020
* @license MIT
**/

use blacksenator\fritzsoap\fritzsoap;

class x_voip extends fritzsoap
{
    /**
     * getInfoEx
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewVoIPNumberMinChars
     * out: NewVoIPNumberMaxChars
     * out: NewVoIPNumberAllowedChars
     * out: NewVoIPUsernameMinChars
     * out: NewVoIPUsernameMaxChars
     * out: NewVoIPUsernameAllowedChars
     * out: NewVoIPPasswordMinChars
     * out: NewVoIPPasswordMaxChars
     * out: NewVoIPPasswordAllowedChars
     * out: NewVoIPRegistrarMinChars
     * out: NewVoIPRegistrarMaxChars
     * out: NewVoIPRegistrarAllowedChars
     * out: NewVoIPSTUNServerMinChars
     * out: NewVoIPSTUNServerMaxChars
     * out: NewVoIPSTUNServerAllowedChars
     * out: NewX_AVM-DE_ClientUsernameMinChars
     * out: NewX_AVM-DE_ClientUsernameMaxChars
     * out: NewX_AVM-DE_ClientUsernameAllowedChars
     * out: NewX_AVM-DE_ClientPasswordMinChars
     * out: NewX_AVM-DE_ClientPasswordMaxChars
     * out: NewX_AVM-DE_ClientPasswordAllowedChars
     *
     */
    public function getInfoEx()
    {
        $result = $this->client->GetInfoEx();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_AddVoIPAccount
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewVoIPAccountIndex
     * in: NewVoIPRegistrar
     * in: NewVoIPNumber
     * in: NewVoIPUsername
     * in: NewVoIPPassword
     * in: NewVoIPOutboundProxy
     * in: NewVoIPSTUNServer
     *
     */
    public function x_AVM_DE_AddVoIPAccount()
    {
        $result = $this->client->{'X_AVM-DE_AddVoIPAccount'}();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetVoIPAccount
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewVoIPAccountIndex
     * out: NewVoIPRegistrar
     * out: NewVoIPNumber
     * out: NewVoIPUsername
     * out: NewVoIPPassword
     * out: NewVoIPOutboundProxy
     * out: NewVoIPSTUNServer
     *
     */
    public function x_AVM_DE_GetVoIPAccount()
    {
        $result = $this->client->{'X_AVM-DE_GetVoIPAccount'}();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_DelVoIPAccount
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewVoIPAccountIndex
     *
     */
    public function x_AVM_DE_DelVoIPAccount()
    {
        $result = $this->client->{'X_AVM-DE_DelVoIPAccount'}();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * getInfo
     *
     * out: NewFaxT38Enable
     * out: NewVoiceCoding
     *
     * @return array
     */
    public function getInfo(): array
    {
        $result = $this->client->GetInfo();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not get info from FRITZ!Box", $this->errorCode, $this->errorText));
            return [];
        }

        return $result;
    }

    /**
     * setConfig
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewFaxT38Enable
     * in: NewVoiceCoding
     *
     */
    public function setConfig()
    {
        $result = $this->client->SetConfig();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * getMaxVoIPNumbers
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewMaxVoIPNumbers
     *
     */
    public function getMaxVoIPNumbers()
    {
        $result = $this->client->GetMaxVoIPNumbers();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * getExistingVoIPNumbers
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewExistingVoIPNumbers
     *
     */
    public function getExistingVoIPNumbers()
    {
        $result = $this->client->GetExistingVoIPNumbers();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetNumberOfClients
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewX_AVM-DE_NumberOfClients
     *
     */
    public function x_AVM_DE_GetNumberOfClients()
    {
        $result = $this->client->{'X_AVM-DE_GetNumberOfClients'}();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetClient
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewX_AVM-DE_ClientIndex
     * out: NewX_AVM-DE_ClientUsername
     * out: NewX_AVM-DE_ClientRegistrar
     * out: NewX_AVM-DE_ClientRegistrarPort
     * out: NewX_AVM-DE_PhoneName
     * out: NewX_AVM-DE_OutGoingNumber
     *
     */
    public function x_AVM_DE_GetClient()
    {
        $result = $this->client->{'X_AVM-DE_GetClient'}();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetClient2
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewX_AVM-DE_ClientIndex
     * out: NewX_AVM-DE_ClientUsername
     * out: NewX_AVM-DE_ClientRegistrar
     * out: NewX_AVM-DE_ClientRegistrarPort
     * out: NewX_AVM-DE_PhoneName
     * out: NewX_AVM-DE_ClientId
     * out: NewX_AVM-DE_OutGoingNumber
     * out: NewX_AVM-DE_InternalNumber
     *
     */
    public function x_AVM_DE_GetClient2()
    {
        $result = $this->client->{'X_AVM-DE_GetClient2'}();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_SetClient
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewX_AVM-DE_ClientIndex
     * in: NewX_AVM-DE_ClientPassword
     * in: NewX_AVM-DE_PhoneName
     * in: NewX_AVM-DE_OutGoingNumber
     *
     */
    public function x_AVM_DE_SetClient()
    {
        $result = $this->client->{'X_AVM-DE_SetClient'}();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_SetClient2
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewX_AVM-DE_ClientIndex
     * in: NewX_AVM-DE_ClientPassword
     * in: NewX_AVM-DE_ClientId
     * in: NewX_AVM-DE_PhoneName
     * in: NewX_AVM-DE_OutGoingNumber
     *
     */
    public function x_AVM_DE_SetClient2()
    {
        $result = $this->client->{'X_AVM-DE_SetClient2'}();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetClient3
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewX_AVM-DE_ClientIndex
     * out: NewX_AVM-DE_ClientUsername
     * out: NewX_AVM-DE_ClientRegistrar
     * out: NewX_AVM-DE_ClientRegistrarPort
     * out: NewX_AVM-DE_PhoneName
     * out: NewX_AVM-DE_ClientId
     * out: NewX_AVM-DE_OutGoingNumber
     * out: NewX_AVM-DE_InComingNumbers
     * out: NewX_AVM-DE_ExternalRegistration
     * out: NewX_AVM-DE_InternalNumber
     * out: NewX_AVM-DE_DelayedCallNotification
     *
     */
    public function x_AVM_DE_GetClient3()
    {
        $result = $this->client->{'X_AVM-DE_GetClient3'}();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetClientByClientId
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewX_AVM-DE_ClientId
     * out: NewX_AVM-DE_ClientId
     * out: NewX_AVM-DE_ClientIndex
     * out: NewX_AVM-DE_ClientUsername
     * out: NewX_AVM-DE_ClientRegistrar
     * out: NewX_AVM-DE_ClientRegistrarPort
     * out: NewX_AVM-DE_PhoneName
     * out: NewX_AVM-DE_OutGoingNumber
     * out: NewX_AVM-DE_InComingNumbers
     * out: NewX_AVM-DE_ExternalRegistration
     * out: NewX_AVM-DE_InternalNumber
     * out: NewX_AVM-DE_DelayedCallNotification
     *
     */
    public function x_AVM_DE_GetClientByClientId()
    {
        $result = $this->client->{'X_AVM-DE_GetClientByClientId'}();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_SetClient3
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewX_AVM-DE_ClientIndex
     * in: NewX_AVM-DE_ClientPassword
     * in: NewX_AVM-DE_ClientId
     * in: NewX_AVM-DE_PhoneName
     * in: NewX_AVM-DE_OutGoingNumber
     * in: NewX_AVM-DE_InComingNumbers
     * in: NewX_AVM-DE_ExternalRegistration
     *
     */
    public function x_AVM_DE_SetClient3()
    {
        $result = $this->client->{'X_AVM-DE_SetClient3'}();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_SetClient4
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewX_AVM-DE_ClientIndex
     * in: NewX_AVM-DE_ClientPassword
     * in: NewX_AVM-DE_ClientUsername
     * in: NewX_AVM-DE_PhoneName
     * in: NewX_AVM-DE_ClientId
     * in: NewX_AVM-DE_OutGoingNumber
     * in: NewX_AVM-DE_InComingNumbers
     * out: NewX_AVM-DE_InternalNumber
     *
     */
    public function x_AVM_DE_SetClient4()
    {
        $result = $this->client->{'X_AVM-DE_SetClient4'}();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetClients
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewX_AVM-DE_ClientList
     *
     */
    public function x_AVM_DE_GetClients()
    {
        $result = $this->client->{'X_AVM-DE_GetClients'}();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetNumberOfNumbers
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewNumberOfNumbers
     *
     */
    public function x_AVM_DE_GetNumberOfNumbers()
    {
        $result = $this->client->{'X_AVM-DE_GetNumberOfNumbers'}();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetNumbers
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewNumberList
     *
     */
    public function x_AVM_DE_GetNumbers()
    {
        $result = $this->client->{'X_AVM-DE_GetNumbers'}();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_DeleteClient
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewX_AVM-DE_ClientIndex
     *
     */
    public function x_AVM_DE_DeleteClient()
    {
        $result = $this->client->{'X_AVM-DE_DeleteClient'}();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_DialGetConfig
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewX_AVM-DE_PhoneName
     *
     */
    public function x_AVM_DE_DialGetConfig()
    {
        $result = $this->client->{'X_AVM-DE_DialGetConfig'}();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_DialSetConfig
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewX_AVM-DE_PhoneName
     *
     */
    public function x_AVM_DE_DialSetConfig()
    {
        $result = $this->client->{'X_AVM-DE_DialSetConfig'}();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_DialNumber
     *
     * dial a number
     * precondition: you must activate "Wählhilfe" in your FRITZ!Box:
     * Telefonie -> Telefonbuch -> Wählhilfe -> Wählhilfe verwenden
     *
     * @param string $number
     * @return void
     */
    public function x_AVM_DE_DialNumber($number)
    {
        $result = $this->client->{'X_AVM-DE_DialNumber'}(new \SoapParam($number, 'NewX_AVM-DE_PhoneNumber'));
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not dial the number %s", $this->errorCode, $this->errorText, $number));
        }
    }

    /**
     * x_AVM_DE_DialHangup
     *
     * Disconnect the dialling process
     * precondition: you must activate "Wählhilfe" in your FRITZ!Box:
     * Telefonie -> Telefonbuch -> Wählhilfe -> Wählhilfe verwenden
     *
     * @return void
     */
    public function x_AVM_DE_DialHangup()
    {
        $result = $this->client->{'X_AVM-DE_DialHangup'}();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not hang up", $this->errorCode, $this->errorText));
        }
    }

    /**
     * x_AVM_DE_GetPhonePort
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewIndex
     * out: NewX_AVM-DE_PhoneName
     *
     */
    public function x_AVM_DE_GetPhonePort()
    {
        $result = $this->client->{'X_AVM-DE_GetPhonePort'}();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_SetDelayedCallNotification
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewX_AVM-DE_ClientIndex
     * in: NewX_AVM-DE_DelayedCallNotification
     *
     */
    public function x_AVM_DE_SetDelayedCallNotification()
    {
        $result = $this->client->{'X_AVM-DE_SetDelayedCallNotification'}();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * getVoIPCommonCountryCode
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewVoIPCountryCode
     *
     */
    public function getVoIPCommonCountryCode()
    {
        $result = $this->client->GetVoIPCommonCountryCode();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetVoIPCommonCountryCode
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewX_AVM-DE_LKZ
     * out: NewX_AVM-DE_LKZPrefix
     *
     */
    public function x_AVM_DE_GetVoIPCommonCountryCode()
    {
        $result = $this->client->{'X_AVM-DE_GetVoIPCommonCountryCode'}();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * setVoIPCommonCountryCode
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewVoIPCountryCode
     *
     */
    public function setVoIPCommonCountryCode()
    {
        $result = $this->client->SetVoIPCommonCountryCode();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_SetVoIPCommonCountryCode
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewX_AVM-DE_LKZ
     * in: NewX_AVM-DE_LKZPrefix
     *
     */
    public function x_AVM_DE_SetVoIPCommonCountryCode()
    {
        $result = $this->client->{'X_AVM-DE_SetVoIPCommonCountryCode'}();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * getVoIPEnableCountryCode
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewVoIPAccountIndex
     * out: NewVoIPEnableCountryCode
     *
     */
    public function getVoIPEnableCountryCode()
    {
        $result = $this->client->GetVoIPEnableCountryCode();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * setVoIPEnableCountryCode
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewVoIPAccountIndex
     * in: NewVoIPEnableCountryCode
     *
     */
    public function setVoIPEnableCountryCode()
    {
        $result = $this->client->SetVoIPEnableCountryCode();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * getVoIPCommonAreaCode
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewVoIPAreaCode
     *
     */
    public function getVoIPCommonAreaCode()
    {
        $result = $this->client->GetVoIPCommonAreaCode();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetVoIPCommonAreaCode
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewX_AVM-DE_OKZ
     * out: NewX_AVM-DE_OKZPrefix
     *
     */
    public function x_AVM_DE_GetVoIPCommonAreaCode()
    {
        $result = $this->client->{'X_AVM-DE_GetVoIPCommonAreaCode'}();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * setVoIPCommonAreaCode
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewVoIPAreaCode
     *
     */
    public function setVoIPCommonAreaCode()
    {
        $result = $this->client->SetVoIPCommonAreaCode();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_SetVoIPCommonAreaCode
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewX_AVM-DE_OKZ
     * in: NewX_AVM-DE_OKZPrefix
     *
     */
    public function x_AVM_DE_SetVoIPCommonAreaCode()
    {
        $result = $this->client->{'X_AVM-DE_SetVoIPCommonAreaCode'}();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * getVoIPEnableAreaCode
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewVoIPAccountIndex
     * out: NewVoIPEnableAreaCode
     *
     */
    public function getVoIPEnableAreaCode()
    {
        $result = $this->client->GetVoIPEnableAreaCode();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * setVoIPEnableAreaCode
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewVoIPAccountIndex
     * in: NewVoIPEnableAreaCode
     *
     */
    public function setVoIPEnableAreaCode()
    {
        $result = $this->client->SetVoIPEnableAreaCode();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetAlarmClock
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewIndex
     * out: NewX_AVM-DE_AlarmClockEnable
     * out: NewX_AVM-DE_AlarmClockName
     * out: NewX_AVM-DE_AlarmClockTime
     * out: NewX_AVM-DE_AlarmClockWeekdays
     * out: NewX_AVM-DE_AlarmClockPhoneName
     *
     */
    public function x_AVM_DE_GetAlarmClock()
    {
        $result = $this->client->{'X_AVM-DE_GetAlarmClock'}();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_SetAlarmClockEnable
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewIndex
     * in: NewX_AVM-DE_AlarmClockEnable
     *
     */
    public function x_AVM_DE_SetAlarmClockEnable()
    {
        $result = $this->client->{'X_AVM-DE_SetAlarmClockEnable'}();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetNumberOfAlarmClocks
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewX_AVM-DE_NumberOfAlarmClocks
     *
     */
    public function x_AVM_DE_GetNumberOfAlarmClocks()
    {
        $result = $this->client->{'X_AVM-DE_GetNumberOfAlarmClocks'}();
        if (is_soap_fault($result)) {
            $this->getErrorData($result);
            error_log(sprintf("Error: %s (%s)! Could not ... from/to FRITZ!Box", $this->errorCode, $this->errorText));
            return;
        }

        return $result;
    }

}
