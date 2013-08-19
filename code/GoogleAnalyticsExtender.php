<?php
class GoogleAnalyticsExtender extends DataExtension {
	function contentControllerInit($controller) {
		$accountId = $this->owner->SiteConfig->GoogleAnalyticsAccountID;
		$gVerification = $this->owner->SiteConfig->GoogleSiteVerification;
		$gDomain = str_replace(Director::protocol(), '' , Director::absoluteBaseURL());
		$gDomain = str_replace('www.', '' , $gDomain);
		$gDomain = rtrim($gDomain, "/");
		if(preg_match("/UA-[0-9]{7,}-[0-9]{1,}/", $accountId) &&  Director::isLive()) {
		Requirements::insertHeadTags(sprintf(
			'<script>
  (function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,\'script\',\'//www.google-analytics.com/analytics.js\',\'ga\');

  ga(\'create\', \'%s\', \'%s\');
  ga(\'send\', \'pageview\');

</script>', $accountId, $gDomain
		));
		}
		if($gVerification && $this->owner->ClassName == 'HomePage') {
			Requirements::insertHeadTags('<meta name="google-site-verification" content="'. $gVerification .'" />');
		}
	}
}
