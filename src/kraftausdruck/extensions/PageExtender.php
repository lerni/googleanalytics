<?php

namespace Kraftausdruck\Extensions;

use SilverStripe\Control\Director;
use SilverStripe\ORM\DataExtension;
use SilverStripe\View\ArrayData;
use SilverStripe\View\Requirements;


class PageExtender extends DataExtension
{
	public function contentControllerInit($controller)
	{
		$accountId = $this->owner->SiteConfig->GoogleAnalyticsAccountID;
		$GTMAccountId = $this->owner->SiteConfig->GTMAccountID;
		$arrayData = new ArrayData(array(
			'accountId' => $accountId,
			'GTMAccountId' => $GTMAccountId
		));
		if (preg_match("/UA-[0-9]{7,}-[0-9]{1,}/", $accountId) && Director::isLive()) {
			if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Speed Insights') === false) {
				$analyticsString = $arrayData->renderWith('Ananlytics');
				Requirements::insertHeadTags($analyticsString);
			}
		}
	}
}
