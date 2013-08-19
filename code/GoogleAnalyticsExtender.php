<?php
class GoogleAnalyticsExtender extends DataExtension {
	function contentControllerInit($controller) {
		$accountId = $this->owner->SiteConfig->GoogleAnalyticsAccountID;
		$gVerification = $this->owner->SiteConfig->GoogleSiteVerification;
		if(preg_match("/UA-[0-9]{7,}-[0-9]{1,}/", $accountId) &&  Director::isLive()) {
Requirements::customScript(<<<JS
var _gaq = [['_setAccount', '$accountId'], ['_trackPageview']];
(function(d, t) {
	var g = d.createElement(t),
		s = d.getElementsByTagName(t)[0];
	g.async = true;
	g.src = '//www.google-analytics.com/ga.js';
	s.parentNode.insertBefore(g, s);
})(document, 'script');
JS
);
		}
		if($gVerification) {
			Requirements::insertHeadTags('<meta name="google-site-verification" content="'. $gVerification .'" />');
		}
	}
}
