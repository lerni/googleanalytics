# Google Analytics (Universal Analytics)

## Requirements

* Silverstripe 3.x

## Installation

Download, place the folder "googleanalytics" in your project root and run a dev/build?flush=1


## Usage Overview

A module to add Google Trackingcode (Universal Analytics) & Siteverification Metatag per SiteConfig in CMS


## Known Issues

* Trackingcode is only shown in live-mode.
* The name of the Web-Property (see: https://support.google.com/analytics/answer/2790010?hl=en&ref_topic=2790009 )is assumed to be the domain-name without www-Prefix.
* Probable the Tracking Code should be in a Template-File and not in php.
* ATM there is no way to "upgrade" a profile to "Universal Analytics": http://stackoverflow.com/questions/16528899/upgrading-to-google-universal-analytics
