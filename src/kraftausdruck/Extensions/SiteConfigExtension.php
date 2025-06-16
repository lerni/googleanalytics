<?php

namespace Kraftausdruck\Extensions;

use SilverStripe\Assets\File;
use SilverStripe\Core\Extension;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\HeaderField;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\AssetAdmin\Forms\UploadField;

class SiteConfigExtension extends Extension
{
    private static $db = [
        'GoogleAnalyticsAccountID' => 'Text',
        'GTMAccountID' => 'Varchar',
        'GoogleAnalyticsAccountV4IDs' => 'Text',
        'Clarity' => 'Varchar',
        'ConsentModeEnabled' => 'Boolean',
        'ConsentModeAdvanced' => 'Boolean'
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

        $tagField = TextField::create('GoogleAnalyticsAccountID', _t(__CLASS__ . '.GoogleAnalyticsAccountIDField', 'Google Analytics Code (UA-XXXXXXXX-X)'));
        $GTMAccountField = TextField::create('GTMAccountID', _t(__CLASS__ . '.GTMAccountIDField', 'Google Tag Manager (GTM-XXXXXXX)'), '', 13);
        $GoogleAnalyticsAccountV4IDsField = TextareaField::create('GoogleAnalyticsAccountV4IDs', _t(__CLASS__ . '.GoogleAnalyticsAccountV4IDsField', 'Google Analytics v4 (G-XXXXXXXXXX)'), '', 13);
        $GoogleAnalyticsAccountV4IDsField->setDescription(_t(__CLASS__ . '.GoogleAnalyticsAccountV4IDsFieldDescription', 'One per line if multiple!'));
        $fields->addFieldsToTab($tab, [
            HeaderField::create('GoogleHeading', _t(__CLASS__ . '.GoogleHeadingField', 'Google')),
            $tagField,
            $GTMAccountField,
            $GoogleAnalyticsAccountV4IDsField
        ]);

        $fields->addFieldsToTab($tab, [
            HeaderField::create('ConsentModeHeading', _t(__CLASS__ . '.ConsentModeHeadingField', 'Google Consent Mode v2')),
            CheckboxField::create('ConsentModeEnabled', _t(__CLASS__ . '.ConsentModeEnabledField', 'Enable Google Consent Mode v2'))
                ->setDescription(_t(__CLASS__ . '.ConsentModeEnabledDescription', 'Enables Google Consent Mode v2 for privacy-compliant tracking')),
            CheckboxField::create('ConsentModeAdvanced', _t(__CLASS__ . '.ConsentModeAdvancedField', 'Use Advanced Consent Mode'))
                ->setDescription(_t(__CLASS__ . '.ConsentModeAdvancedDescription', 'Send pings even when consent is denied (helps with conversion modeling)'))
        ]);

        $fields->addFieldsToTab($tab, [
            HeaderField::create('ClarityHeading', _t(__CLASS__ . '.ClarityHeadingField', 'Clarity')),
            TextField::create('Clarity', _t(__CLASS__ . '.ClarityField', 'Clarity Tracking ID')),
            UploadField::create('BingSiteAuthFile', _t(__CLASS__ . '.BingSiteAuthFileField', 'BingSiteAuth.xml'))
        ]);
    }
}
