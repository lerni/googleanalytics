<?php
class GoogleAnalytics extends DataObjectDecorator {
	function extraStatics(){
		return array(
			'db' => array(
				'GoogleAnalyticsAccountID' => 'Text',
				'GoogleSiteVerification' => 'Text'
				
			)
		);
	}
	public function updateCMSFields(FieldSet &$fields) {
	
		$fields->addFieldToTab("Root.Main", new HeaderField( 'Google'));
		$fields->addFieldToTab('Root.Main', new TextField('GoogleAnalyticsAccountID', 'Google Analytics Code (Example: UA-XXXXXXXX-X)', '', 14));
		$fields->addFieldToTab('Root.Main', new TextField('GoogleSiteVerification', 'Google Site Verification Code (Example: S0z09x-7vg1GRUMbDLZOPaomySLaMDFMMbinycb9KkE)'));
	}
	function contentControllerInit($controller) {
	}
}