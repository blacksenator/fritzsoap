# fritzsoap

The class provides functions to read and manipulate data via TR-064 interface on FRITZ!Box router from AVM.
Due to the large number of actions (functions) provided by AVM (my 7490 has 475 actions), only a few are exemplarily coded as functions.
The majority of coded actions refer to changes to the phone book.
To be continued...
With the help of this class and its examples, it should not be difficult to supplement your own desired functions as needed.

With the instantiation of the class, all available services of the addressed FRITZ!Box are determined. The service parameters and available actions are provided in a compressed form as XML and can be output with `getServiceDescription()`. The matching SOAP client only needs to be called with the name of the services `<services name = "...">` and gets the correct location and uri from the XML (see `getFritzBoxServices()` for details)

## Requirements

  * PHP 7.0
  * Composer (follow the installation guide at https://getcomposer.org/download/)

## Installation

You can install it through Composer:

    "require": {
        "blacksenator/fritzsoap": "^1.0"
    },

or

    git clone https://github.com/blacksenator/fritzsoap.git

## Usage
Example if you wanna know your avalaible services initially:

    $fritzbox = new fritzsoap($url, $user, $password);
    $services = $fritzbox->getServiceDescription();
    $services->asXML('services.xml');

Example to get a list of all your network devices:

    $fritzbox = new fritzsoap($url, $user, $password);
    $fritzbox->getClient('hosts');
    $meshList = $fritzbox->getMeshListPath();

Example to dial a number (connected to one of your phone devices):

    $fritzbox = new fritzsoap($url, $user, $password);
    $fritzbox->getClient('x_voip');
    $fritzbox->dialNumber('#9');

## License
This script is released under MIT license.

## Authors
Copyright (c) 2019 Volker Püschel