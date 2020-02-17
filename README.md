# fritzsoap

The class provides functions to read and manipulate data via TR-064 interface on FRITZ!Box routers from AVM.
Due to the large number of **actions** provided (more than 400), only a few of them are **coded as functions** ready for use.

The majority of coded actions refer to changes to the phone book.
To be continued...
With the help of this class and its examples, it should not be difficult to supplement your own desired actions as functions as needed.

With the instantiation of the class, **all available services of the addressed FRITZ!Box are determined**. So you just have to take care of little, to perform the desired action.
The service parameters and available actions are provided in a compressed form as XML and can be output with `getServiceDescription()`.

Example output:

<img src="assets/services_xml.jpg"/>

The matching SOAP client only needs to be called with the instantiation of the related class and gets the correct location and uri automatically from this XML.
So you only need to know what **action** you need and in what **service** (e.g. class) it is provided.
For reference, it is highly recommended to consult the information [AVM provides for interfaces](https://avm.de/service/schnittstellen/)!
If no coding has been done for this particular action in this class - which is probably the case - the existing examples should show how easy it is to code a function for your desired action (contribution to extend this class is welcome!).

In addition, this class uses [fbvalidateurl](https://packagist.org/packages/blacksenator/fbvalidateurl). So you do not have to worry about whether you enter the router address with or without scheme (`http://`/`https://`), with hostname (`fritz.box`) or IP (`192.168.178.1`). Based on the validated URL, **the correct SOAP port is also determined automatically!**

## Inheritance

`fritzsoap.php` is the main class providing general basic objects. All other subclasses are extension of this class. You usually use this subclasses. **Each subclass refers to exactly one service!**

## Genesis

**Please note: All subclasses have been automatically generated!** Base of this generation are the service description xml files of my FRITZ!Box 7490. That was an easy and flawless way to transfer the large amount of services and their actions into a generic structure.

### Completion

About 5% of the actions are already coded. If so, you will find in the class header comment:
`THIS FILE IS AUTOMATIC ASSEMBLED BUT PARTLY REVIEWED!` - in all other cases the part "BUT PARTLY REVIEWED" is missing.

You will know if a functions coding is reviewed if you find one - in all other cases untouched functions are clearly recognizable:
`automatically generated; complete coding if necessary!`

To facilitate the completion of this creation, you will find the input or output arguments in the comment section of the function - if it has any.
But as I said: it is highly recommended to consult the information [AVM provides for interfaces](https://avm.de/service/schnittstellen/) -  even if the documentation offered there is horrible!

Take a look at the finished functions to transfer the use of the input and output parameters and to adjust the return of the function (`x_contact.php` is the most productive source at the moment)

### Ghosts

Automatic generation has also identified 14 services that are not officially documented by AVM. I suspect these are interfaces for DSL/Cable providers. Accordingly, these classes have no link to the reference document at AVM in the class comment.

## Requirements

  * PHP 7.0
  * Composer (follow the installation guide at https://getcomposer.org/download/)

## Installation

You can install it through Composer:

    "require": {
        "blacksenator/fritzsoap": "^2.0"
    },

or

    git clone https://github.com/blacksenator/fritzsoap.git

## Usage
Example if you wanna know your available services:

    $fritzbox = new x_contact($url, $user, $password);
    $services = $fritzbox->getServiceDescription();
    $services->asXML('services.xml');

Example to get a list of all your network devices:

    $fritzbox = new hosts($url, $user, $password);
    $fritzbox->getClient();
    $meshList = $fritzbox->getMeshListPath();

Example to dial a number (connected to one of your phone devices):

    $fritzbox = new x_voip($url, $user, $password);
    $fritzbox->getClient();
    $fritzbox->dialNumber('#9');

## License
This script is released under MIT license.

## Authors
Copyright (c) 2019 Volker Püschel