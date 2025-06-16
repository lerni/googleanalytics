<?php

namespace Kraftausdruck\Extensions;

use SilverStripe\ORM\ArrayList;
use SilverStripe\Core\Extension;
use SilverStripe\View\ArrayData;
use SilverStripe\Control\Director;
use SilverStripe\Security\Security;
use SilverStripe\View\Requirements;
use SilverStripe\Core\Config\Config;

class PageTrackingExtension extends Extension
{
    public function contentControllerInit($controller)
    {
        $member = Security::getCurrentUser();
        if (Director::isLive() && !$member) {
            $siteConfig = $this->owner->SiteConfig;
            $accountId = $siteConfig->GoogleAnalyticsAccountID;
            $GTMAccountId = $siteConfig->GTMAccountID;
            $accountV4IDs = $this->PerLine($siteConfig->GoogleAnalyticsAccountV4IDs);
            $clarity = $siteConfig->Clarity;
            $consentModeEnabled = $siteConfig->ConsentModeEnabled;
            $consentModeAdvanced = $siteConfig->ConsentModeAdvanced;

            $preconnect = Config::inst()->get('Kraftausdruck\Extensions\PageTrackingExtension', 'preconnect');
            $arrayData = new ArrayData([
                'AccountId' => $accountId,
                'GTMAccountId' => $GTMAccountId,
                'AccountV4IDs' => $accountV4IDs,
                'Clarity' => $clarity,
                'ConsentModeEnabled' => $consentModeEnabled,
                'ConsentModeAdvanced' => $consentModeAdvanced
            ]);

            if ($preconnect === 'true') {
                if (!empty($accountId) || !empty($GTMAccountId) || !empty($accountV4IDs)) {
                    Requirements::insertHeadTags('<link rel="preconnect" href="https://www.googletagmanager.com">');
                }
                if (!empty($clarity)) {
                    Requirements::insertHeadTags('<link rel="preconnect" href="https://www.clarity.ms">');
                }
            }
            $trackingString = $arrayData->renderWith('Analytics');
            Requirements::insertHeadTags($trackingString);
        }
    }

    public function PerLine($text, $start = 0)
    {
        $r = ArrayList::create();
        if ($text) {
            $stringwithnoemptylines = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $text);
            $lines = explode(PHP_EOL, $stringwithnoemptylines);
            $i = 0;
            foreach ($lines as $l) {
                if ($start <= ($i + 1)) {
                    $r->push(ArrayData::create(['Item' => $l]));
                }
                $i++;
            }
        }
        return $r;
    }
}
