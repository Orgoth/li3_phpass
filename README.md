# li3_phpass #

## DESCRIPTION ##

This repository contains a [Lithium](https://github.com/UnionOfRAD/lithium) helper that wraps [PHPassLib 3.x](https://github.com/rchouinard/phpass/tree/3.x) functionnality.

## SETUP ##

Add this to a Lithium MVC project via:

    git submodule add https://github.com/Orgoth/li3_phpass.git libraries/li3_phpass

To add li3_phpass module to your current lithium application, edit:

    /your_app/config/libraries.php

Add the following line near the end of the file:

    Libraries::add('li3_phpass'); // default BCrypt

or

    Libraries::add('li3_phpass',array(
        'adapter' => 'SHA512Crypt'
    ));

## Notes ##

- ugly code cleanup needed