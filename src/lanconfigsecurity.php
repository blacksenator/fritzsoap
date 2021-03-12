<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides functions to read and manipulate
 * data via TR-064 interface on FRITZ!Box router from AVM:
 * according to:
 * @see: https://avm.de/fileadmin/user_upload/Global/Service/Schnittstellen/lanconfigsecuritySCPD.pdf
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

class lanconfigsecurity extends fritzsoap
{
    const
        SERVICE_TYPE = 'urn:dslforum-org:service:LANConfigSecurity:1',
        CONTROL_URL  = '/upnp/control/lanconfigsecurity';

    /**
     * getInfo
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewMaxCharsPassword (ui2)
     * out: NewMinCharsPassword (ui2)
     * out: NewAllowedCharsPassword (string)
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
     * x_AVM_DE_GetCurrentUser
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewX_AVM-DE_CurrentUsername (string)
     * out: NewX_AVM-DE_CurrentUserRights (string)
     *
     * @return array
     */
    public function x_AVM_DE_GetCurrentUser()
    {
        $result = $this->client->{'X_AVM-DE_GetCurrentUser'}();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetAnonymousLogin
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewX_AVM-DE_AnonymousLoginEnabled (boolean)
     * out: NewX_AVM-DE_ButtonLoginEnabled (boolean)
     *
     * @return array
     */
    public function x_AVM_DE_GetAnonymousLogin()
    {
        $result = $this->client->{'X_AVM-DE_GetAnonymousLogin'}();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * setConfigPassword
     *
     * automatically generated; complete coding if necessary!
     *
     * in: NewPassword (string)
     *
     * @param string $password
     * @return void
     */
    public function setConfigPassword($password)
    {
        $result = $this->client->SetConfigPassword(
            new \SoapParam($password, 'NewPassword'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * x_AVM_DE_GetUserList
     *
     * automatically generated; complete coding if necessary!
     *
     * out: NewX_AVM-DE_UserList (string)
     *
     * @return string
     */
    public function x_AVM_DE_GetUserList()
    {
        $result = $this->client->{'X_AVM-DE_GetUserList'}();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

}
