# fritzsoap

The class provides functions to read and manipulate data via TR-064 interface on FRITZ!Box routers from AVM.
Due to the large number of actions provided (my 7490 has more than 400), only a few of these are exemplarily coded as functions.

The majority of coded actions refer to changes to the phone book.
To be continued...
With the help of this class and its examples, it should not be difficult to supplement your own desired functions as needed.

With the instantiation of the class, **all available services of the addressed FRITZ!Box are determined**. So you just have to take care of little, to perform the desired action.
The service parameters and available actions are provided in a compressed form as XML and can be output with `getServiceDescription()`.

Example output:

<img src="assets/services_xml.jpg"/>

The matching SOAP client only needs to be called with the name of the services `<services name = "...">` and gets the correct location and uri from this XML.
So you only need to know what **action** you need and in what **service** it is provided.
For reference, it is highly recommended to consult the information [AVM provides for interfaces](https://avm.de/service/schnittstellen/)!
With one unique output, you can check if your FRITZ!Box supports this action. If no coding has been done for this particular action in this class - which is probably the case - the existing examples should show how easy it is to code a function for your desired action (contribution to extend this class is welcome!).

In addition, this class uses [fbvalidateurl](https://packagist.org/packages/blacksenator/fbvalidateurl). So you do not have to worry about whether you enter the router address with or without scheme (`http://`/`https://`), with hostname (`fritz.box`) or IP (`192.168.178.1`). Based on the validated URL, **the correct SOAP port is also determined automatically!**

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