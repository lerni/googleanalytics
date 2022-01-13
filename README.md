# Silverstripe Analytics, Tag Manager & Clarity Module

A module to add Google Analytics (UA, v4) & Tag-Manager (just script version but not noscript iframe) & Clarity Trackingcode per SiteConfig in CMS

## Requirements

-   silverstripe/cms ^4
-   silverstripe/siteconfig ^4

## Suggested

-   lerni/klaro-cookie-consent

## Installation

[Composer](https://getcomposer.org/) is the recommended way of installing Silverstripe modules.

`composer require lerni/silverstripe-googleanalytics`

Run `dev/build`

This module allows XML files to be uploaded into assets.

## How to use

Set the Tracking IDs in yoursite.tld/admin/settings and you're set.

## Hint

-   Trackingcodes are only shown in live-mode.
-   opt-out may use `lerni/klaro-cookie-consent`
