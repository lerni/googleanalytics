<?php

namespace Kraftausdruck\Extensions;

use SilverStripe\Assets\File;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\FieldGroup;
use SilverStripe\Forms\HeaderField;
use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\TextareaField;
use SilverStripe\AssetAdmin\Forms\UploadField;


class SiteConfigExtension extends DataExtension
{
    private static $db = [
        'GoogleAnalyticsAccountID' => 'Text',
        'GTMAccountID' => 'Varchar',
        'GoogleAnalyticsAccountV4IDs' => 'Text',
        'Clarity' => 'Varchar'
    ];

    private static $has_one = [
        'BingSiteAuthFile' => File::class
    ];

    private static $owns = [
        'BingSiteAuthFile'
    ];

    public function updateCMSFields(FieldList $fields)
    {
        $tab = 'Root.Tracking';

        $tagField = TextField::create('GoogleAnalyticsAccountID', _t(__CLASS__ . '.GoogleAnalyticsAccountIDField', 'Google Analytics Code (Example: UA-XXXXXXXX-X)'));
        $GTMAccountField = TextField::create('GTMAccountID', _t(__CLASS__ . '.GTMAccountIDField', 'Google Analytics v4 (Example: G-XXXXXX)'), '', 13);
        $GoogleAnalyticsAccountV4IDsField = TextareaField::create('GoogleAnalyticsAccountV4IDs', _t(__CLASS__ . '.GoogleAnalyticsAccountV4IDsField', 'Google Analytics v4 (Example: G-XXXXXX)'), '', 13);
        $GoogleAnalyticsAccountV4IDsField->setDescription(_t(__CLASS__ . '.GoogleAnalyticsAccountV4IDsFieldDescription', 'One per line if muliple!'));
        $fields->addFieldsToTab($tab, [
            HeaderField::create('GoogleHeading', _t(__CLASS__ . '.GoogleHeadingField', 'Google')),
            $tagField,
            $GTMAccountField,
            $GoogleAnalyticsAccountV4IDsField
        ]);

        $fields->addFieldsToTab($tab, [
            HeaderField::create('ClarityHeading', _t(__CLASS__ . '.ClarityHeadingField', 'Clarity')),
            TextField::create('Clarity', _t(__CLASS__ . '.ClarityField', 'Clarity Tracking ID')),
            UploadField::create('BingSiteAuthFile', _t(__CLASS__ . '.BingSiteAuthFileField', 'BingSiteAuth.xml'))
        ]);
    }
}
