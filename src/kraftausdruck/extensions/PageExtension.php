<?php

namespace Kraftausdruck\Extensions;

use SilverStripe\ORM\ArrayList;
use SilverStripe\Core\Extension;
use SilverStripe\View\ArrayData;
use SilverStripe\Control\Director;
use SilverStripe\View\Requirements;

class PageExtension extends Extension
{
    public function contentControllerInit($controller)
    {
        $accountId = $this->owner->SiteConfig->GoogleAnalyticsAccountID;
        $GTMAccountId = $this->owner->SiteConfig->GTMAccountID;
        $accountV4IDs = $this->PerLine($this->owner->SiteConfig->GoogleAnalyticsAccountV4IDs);
        $clarity = $this->owner->SiteConfig->Clarity;
        $arrayData = new ArrayData([
            'accountId' => $accountId,
            'GTMAccountId' => $GTMAccountId,
            'GTMAccountIds' => $accountV4IDs,
            'Clarity' => $clarity
        ]);
        if (Director::isLive()) {
            if (!empty($accountId) || !empty($GTMAccountIds) || !empty($accountV4IDs)) {
                Requirements::insertHeadTags('<link rel="preconnect" href="https://www.googletagmanager.com">');
            }
            if (!empty($clarity)) {
                Requirements::insertHeadTags('<link rel="preconnect" https://www.clarity.ms">');
            }
            $trackingString = $arrayData->renderWith('Analytics');
            Requirements::insertHeadTags($trackingString);
        }
    }

    public function PerLine($text)
    {
        $r = ArrayList::create();
        if ($text) {
            $stringwithnoemptylines = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $text);
            $lines = explode(PHP_EOL, $stringwithnoemptylines);
            foreach ($lines as $l) {
                $r->push(ArrayData::create(['Item' => $l]));
            }
        }
        return $r;
    }
}
