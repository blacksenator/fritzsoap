<?php

namespace blacksenator\fritzsoap;

/**
 * This trait provides basic functions to adress the FRITZ!Box properly
 *
 * Copyright (c) 2023 Volker Püschel
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
    protected function setResourceAdresses(string $url)
    {
        $validator = new fbvalidateurl;
        $this->url = $validator->getValidURL($url);
        $this->assembleServerAdress();
    }

    /**
     * assemble the correct server address, depending on whether it is encrypted
     * or not
     *
     * @return void
     */
    private function assembleServerAdress()
    {
        if ($this->url['scheme'] == 'http') {
            $this->fritzBoxURL = 'http://' . $this->url['host'] . ':' . self::HTTP_PORT;
        } elseif ($this->url['scheme'] == 'https') {
            $this->fritzBoxURL = 'https://' . $this->url['host'] . ':' . self::HTTPS_PORT;
        } else {
            throw new \Exception ('Could not assemble valid server address!');
        }
    }

    /**
     * get the validated URL parameters
     *
     * @return array
     */
    public function getURL(): array
    {
        return $this->url;
    }

    /**
     * get the server adress
     *
     * @return string
     */
    public function getServerAdress(): string
    {
        return $this->fritzBoxURL;
    }
}
