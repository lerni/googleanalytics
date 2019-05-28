<?php
class GoogleAnalyticsExtender extends Extension {
	function contentControllerInit($controller) {
		$config = SiteConfig::current_site_config();
		$accountId = $config->GoogleAnalyticsAccountID;
		$GTMAccountId = $config->GTMAccountID;
		$arrayData = new ArrayData(array(
			'accountId' => $accountId,
			'GTMAccountId' => $GTMAccountId
		));
		if(preg_match("/UA-[0-9]{7,}-[0-9]{1,}/", $accountId) &&  Director::isLive()) {
			$analyticsString = $arrayData->renderWith('Ananlytics');
			Requirements::insertHeadTags($analyticsString);
		}
	}
}
