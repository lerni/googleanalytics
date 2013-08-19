<?php
class GoogleAnalyticsExtender extends DataExtension {
	function contentControllerInit($controller) {
		$accountId = $this->owner->SiteConfig->GoogleAnalyticsAccountID;
		$gVerification = $this->owner->SiteConfig->GoogleSiteVerification;
		if(preg_match("/UA-[0-9]{7,}-[0-9]{1,}/", $accountId) &&  Director::isLive()) {
Requirements::insertHeadTags(sprintf(
			'<script>
  var _gaq = _gaq || [];
  _gaq.push([\'_setAccount\', \'%s\']);
  _gaq.push([\'_trackPageview\']);

  (function() {
    var ga = document.createElement(\'script\'); ga.type = \'text/javascript\'; ga.async = true;
    ga.src = (\'https:\' == document.location.protocol ? \'https://ssl\' : \'http://www\') + \'.google-analytics.com/ga.js\';
    var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>', $accountId
		));
		}
		if($gVerification && $this->owner->ClassName == 'HomePage') {
			Requirements::insertHeadTags('<meta name="google-site-verification" content="'. $gVerification .'" />');
		}
	}
}
