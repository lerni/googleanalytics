<?php
class GoogleAnalyticsExtender extends DataExtension {
	function contentControllerInit($controller) {
		$accountId = $this->owner->SiteConfig->GoogleAnalyticsAccountID;
		$arrayData = new ArrayData(array(
			'accountId' => $accountId
		));
		if(preg_match("/UA-[0-9]{7,}-[0-9]{1,}/", $accountId) &&  Director::isLive()) {
			if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Speed Insights') === false) {
				$analyticsString = $arrayData->renderWith('Ananlytics');
				Requirements::insertHeadTags($analyticsString);
			}
		}
	}
}
