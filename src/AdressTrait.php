<?php

namespace blacksenator\fritzsoap;

/**
 * This trait provides basic functions to adress the FRITZ!Box properly
 *
 * Copyright (c) 2025 Volker Püschel
 * @license MIT
 */

use blacksenator\fbvalidateurl\fbvalidateurl;

trait AdressTrait
{
    /**
     * sets the adresses fo the FRITZ!Box resources to access descritions (XML)
     * aswell as SOAP interfaces (services and actions)
     *
     * @param string $url
     * @return void
     */
    protected function setResourceAdresses(string $url = null)
    {
        $validator = new fbvalidateurl;
        $adress = $url ?? $validator::HOSTNAME;
        $this->url = $validator->getValidURL($adress);
        $this->assembleServerAdress($validator);
    }

    /**
     * assemble the correct server address, depending on whether it is encrypted
     * or not
     *
     * @param object $validator
     * @return void
     */
    private function assembleServerAdress(object $validator)
    {
        if ($this->url['scheme'] == 'http') {
            $this->fritzBoxURL = 'http://' . $this->url['host'] . ':' . $validator->getOpenPorts()[1];
        } elseif ($this->url['scheme'] == 'https') {
            $this->fritzBoxURL = 'https://' . $this->url['host'] . ':' . $validator->getSecurePorts()[1];
            stream_context_set_default(
                ['ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                   ],
                ]);
        } else {
            throw new \Exception ('Could not assemble valid server address!');
        }
    }

    /**
     * get the validated URL parameters
     *
     * @return array
     */
    public function getURL()
    {
        return $this->url;
    }

    /**
     * get the server adress
     *
     * @return string
     */
    public function getServerAdress()
    {
        return $this->fritzBoxURL;
    }
}
