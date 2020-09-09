<?php

namespace Kraftausdruck\Extensions;

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\HeaderField;
use SilverStripe\Forms\TextField;
use SilverStripe\ORM\DataExtension;


class SiteConfigExtension extends DataExtension
{
    private static $db = [
        'GoogleAnalyticsAccountID' => 'Varchar',
        'GTMAccountID' => 'Varchar(255)'
    ];

    public function updateCMSFields(FieldList $fields)
    {
        $tab = 'Root.Google';
        $fields->addFieldToTab($tab, HeaderField::create('Google', 'Google'));
        $fields->addFieldToTab($tab, TextField::create('GoogleAnalyticsAccountID', 'Google Analytics Code (Example: UA-XXXXXXXX-X)', '', 14));
        $fields->addFieldToTab($tab, TextField::create('GTMAccountID', 'Google-Tag-Manager (Example: GTM-XXXX)', '', 13));
    }
}
