<?php

namespace Kraftausdruck\Extensions;

use SilverStripe\Control\Director;
use SilverStripe\Core\Extension;;
use SilverStripe\View\ArrayData;
use SilverStripe\View\Requirements;

class PageExtension extends Extension
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
			$analyticsString = $arrayData->renderWith('Ananlytics');
			Requirements::insertHeadTags($analyticsString);
		}
	}
}
