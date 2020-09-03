# Silverstripe Google Analytics & Tag Manager Module
A module to add Google Analytics & Tag-Manager (just script version but not noscript iframe) Trackingcode per SiteConfig in CMS


## Requirements
- silverstripe/cms ^4
- silverstripe/siteconfig ^4
## Suggested
- lerni/klaro-cookie-consent


## Installation
[Composer](https://getcomposer.org/) is the recommended way of installing Silverstripe modules.

`composer require lerni/silverstripe-googleanalytics`

Run `dev/build`


## How to use
Set the Tracking IDs in yoursite.tld/admin/settings and you're set.

## Hint
* You don't need to setup a tag for page load - it's triggerd per script
* Trackingcode is only shown in live-mode.
* opt-out may use `lerni/klaro-cookie-consent`
