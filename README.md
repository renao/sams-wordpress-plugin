# SAMS Integration for WordPress

## Features

* Gutenberg block to integrate a ranking from a SAMS source
* Gutenberg block to integrate a fixtures from a SAMS source

## Context

I administrated the homepage of my hometown volleyball club for nearly two decades and for a long time there was no official way to integrate up-to-date results and fixtures.
So one had to update the information by hand or scrape the content from the leagues official results service.

Some years ago now we got access to the official XML API of the national german volleyball confederation DVV (Deutscher Volleyballverband) of their league management tool `SAMS`.

Because we just migrated the site to WordPress I headed straight into developing a WordPress plugin to integrate the results and fixtures for our teams.
In the first version (before Gutenberg editor released) the Integration was using a shortcode - but it had some flaws and was not that intuitive.

So I decided to change the plugin to migrate to Gutenberg blocks one can integrate just right into the WYSIWYG editor.

The current version is still in a early stage and there are plans to make it more user-friendly and intuitive.
Anyhow with this first refactored version I decided to publish the SAMS Integration Plugin to the official WordPress Plugin Directory so it will become as easy as possible to integrate the plugin in your WordPress environment.


## Installation A: Download from the official WordPress Plugin Directory (recommended)

Will be documented when the release acknoledged by the WordPress Plugins team.

## Installation B: Download Release ZIP and Upload into your WordPress

1. Download the latest release from the Release page here at GitHub
1. Login to your WordPress Admin Control Panel and browse to `Plugins` -> `Install Plugin`
1. Click `Upload Plugin` and select the downloaded Release zip-file


## Usage

Will be updated when the entry in the plugin directory is ready

### Obtaining DVV division, match series, season etc. information
The SAMS XML-interface is describes in the following wiki:
[XML Schnittstelle](http://wiki.sams-server.de/wiki/XML-Schnittstelle#Spielplan_und_Ergebnisse)

## License
This piece of modern art is published with a GNU GPLv2 license. I will not take charge of any harm, damages or data losses that could be caused by this plugin. Use it on your own risk.

## Contact and contributions
Feel free to create an issue, pull request or get in contact with me.