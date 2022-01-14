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

        $tagField = TextField::create('GoogleAnalyticsAccountID', 'Google Analytics Code (Example: UA-XXXXXXXX-X)');
        $GTMAccountField = TextField::create('GTMAccountID', 'Google-Tag-Manager (Example: GTM-XXXX)', '', 13);
        $GoogleAnalyticsAccountV4IDsField = TextareaField::create('GoogleAnalyticsAccountV4IDs', 'Google Analytics v4 (Example: G-XXXXXX)', '', 13);
        $GoogleAnalyticsAccountV4IDsField->setDescription(_t('Kraftausdruck\Extensions\SiteConfigExtension.GoogleAnalyticsAccountV4IDsFieldDescription', 'One per line if muliple!'));
        $fields->addFieldsToTab($tab, [
            HeaderField::create('GoogleHeading', 'Google'),
            $tagField,
            $GTMAccountField,
            $GoogleAnalyticsAccountV4IDsField
        ]);

        $fields->addFieldToTab(
            'Root.Main',
            $DefaultHeaderImageField = UploadField::create(
                $name = 'DefaultHeaderImage',
                $title = _t('SilverStripe\SiteConfig\SiteConfig.DEFAULTHEADERIMAGE', 'Displayed if no Hero in ElementPage')
            )
        );
        $DefaultHeaderImageField->setFolderName('Slides');
        $size = 5 * 1024 * 1024;
        $DefaultHeaderImageField->getValidator()->setAllowedMaxFileSize($size);
        $DefaultHeaderImageField->setDescription(_t('SilverStripe\SiteConfig\SiteConfig.DefaultHeaderImageDescription', '2600x993px'));


        $fields->addFieldsToTab($tab, [
            HeaderField::create('ClarityHeading', 'Clarity'),
            TextField::create('Clarity', 'Clarity Tracking ID'),
            UploadField::create('BingSiteAuthFile', 'BingSiteAuth.xml')
        ]);
    }
}
