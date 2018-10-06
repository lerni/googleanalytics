<?php
class GoogleAnalytics extends DataExtension {
	private static $db = array(
		'GoogleAnalyticsAccountID' => 'Varchar',
		'GTMAccountID' => 'Varchar(255)'
	);
	public function updateCMSFields(FieldList $fields) {
		$fields->addFieldToTab('Root.Main', HeaderField::create('Google'));
		$fields->addFieldToTab('Root.Main', TextField::create('GoogleAnalyticsAccountID', 'Google Analytics Code (Example: UA-XXXXXXXX-X)', '', 14));
		$fields->addFieldToTab('Root.Main', TextField::create('GTMAccountID', 'Google-Tag-Manager (Example: GTM-XXXX)', '', 13));
	}
	function contentControllerInit($controller) {
	}
}
