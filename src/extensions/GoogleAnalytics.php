<?php

namespace KraftAusdruck\GoogleAnalytics\Extensions;

use DataExtension;
use FieldList;
use HeaderField;
use TextField;

class GoogleAnalytics extends DataExtension {
	private static $db = array(
		'GoogleAnalyticsAccountID' => 'Varchar'
	);
	public function updateCMSFields(FieldList $fields) {
		$fields->addFieldToTab("Root.Main", new HeaderField( 'Google'));
		$fields->addFieldToTab('Root.Main', new TextField('GoogleAnalyticsAccountID', 'Google Analytics Code (Example: UA-XXXXXXXX-X)', '', 14));
	}
	function contentControllerInit($controller) {
	}
}
