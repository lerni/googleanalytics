# SilverStripe Google Analytics & Tag Manager Module
A module to add Google Analytics & Tag-Manager (just script version but not noscript iframe) Trackingcode per SiteConfig in CMS

## Requirements
* Silverstripe & CMS 4.x, SiteConfig

## Installation
The easiest way is to use [composer](https://getcomposer.org/):

	`composer require lerni/silverstripe-googleanalytics`

Run `dev/build`

## How to use
Set the Trackin IDs in yoursite.tld/admin/settings and you're set.

## Hint
* You don't need to setup a tag for page load - it's triggerd per script
* Trackingcode is only shown in live-mode.
* opt-out like `<a href="javascript:gaOptout()">`Click to opt-out of Google Analytics`</a>`