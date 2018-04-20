<?php

namespace KraftAusdruck\GoogleAnalytics\Extensions;


use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\HeaderField;
use SilverStripe\Forms\TextField;
use SilverStripe\ORM\DataExtension;


class SiteConfigExtender extends DataExtension
{
	private static $db = [
		'GoogleAnalyticsAccountID' => 'Varchar'
	];

	public function updateCMSFields(FieldList $fields)
	{
		$fields->addFieldToTab("Root.Main", HeaderField::create('Google', 'Google'));
		$fields->addFieldToTab('Root.Main',
			new TextField('GoogleAnalyticsAccountID', 'Google Analytics Code (Example: UA-XXXXXXXX-X)', '', 14));
	}

	public function contentControllerInit($controller)
	{
	}
}
