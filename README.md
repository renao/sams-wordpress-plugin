# WVV Plugin for WordPress

## Features

* Shortcode for WVV table integration
* Shortcode for WVV fixtures integration

## Context

The regional german volleyball confederation WVV (Westdeutscher Volleyballverband) provides an XML API for their league management tool `Aufsteiger`.

After years of maintaining sports-related websites, gathering the experience that there is nothing more boring than updating results, fixtures and standings, I forced myself to head straight into WordPress plugin development and PHP.

## Install

The plugin itself is at a very early stage and I am still new to PHP and WordPress development. Intentionally there are no releases or version numbers provided yet.

Caused by that the installation needs some manual work at the beginning (it is not that hard - trust me).

1. Prepare a folder called `wvv-plugin` and copy the entire content from the folders `app` and `wordpress` into it.
1. Upload the`wvv-plugin` folder to your WordPress plugins directory (`wp-content/plugins`)
1. Log into your sites Admin CP and activate it from the plugins index page

## Usage

### Integrate a WVV table into your WordPress content

After activating the plugin succesfully,you can place a table to a certain point of your website using the `wvvtable` shortcode with a `season` id and a `division` id, like this:

``` php
[wvvtable season="2017" division="201797"]
```

### Integrate a WVV fixture into your WordPress content

You can place fixtures for a certain division and team using the `wvvfixtures` shortcode with a `season` id and a `division` id, and a name of a `club`:

``` php
[wvvfixtures season="2017" division="201781" club="TuS Herten II"]
```

### Obtaining WVV division and season ids

Currently the WVV provides the division ids (`staffel ids` inside the document) on their [Ergebnisdienst](https://www.volleyball.nrw/spielwesen/phoenixaufsteiger/ergebnisdienst/) page, or [click here](https://www.volleyball.nrw/fileadmin/spielwesen/Downloads/staffel_id_2017-18.pdf) to get directly to the list.


## License

This piece of modern art is published with a GNU GPLv3 license. I will not take charge of any harm, damages or data losses that could be caused by this plugin. Use it on your own risk.

## Contact and contributions

Feel free to create a pull request or get in contact with me.
