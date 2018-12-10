<?php

namespace Kraftausdruck\Extensions;

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\HeaderField;
use SilverStripe\Forms\TextField;
use SilverStripe\ORM\DataExtension;


class SiteConfigExtender extends DataExtension
{
	private static $db = [
		'GoogleAnalyticsAccountID' => 'Varchar',
		'GTMAccountID' => 'Varchar(255)'
	];

	public function updateCMSFields(FieldList $fields)
	{
		$fields->addFieldToTab("Root.Main", HeaderField::create('Google', 'Google'));
		$fields->addFieldToTab('Root.Main', TextField::create('GoogleAnalyticsAccountID', 'Google Analytics Code (Example: UA-XXXXXXXX-X)', '', 14));
		$fields->addFieldToTab('Root.Main', TextField::create('GTMAccountID', 'Google-Tag-Manager (Example: GTM-XXXX)', '', 13));
	}

	public function contentControllerInit($controller)
	{
	}
}
