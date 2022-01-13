<?php

namespace Kraftausdruck\Controller;

use SilverStripe\Assets\File;
use SilverStripe\Control\Director;
use SilverStripe\Control\Controller;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\SiteConfig\SiteConfig;


class BingSiteAuthController extends Controller
{

    public function index(HTTPRequest $request)
    {
        $siteConfig = SiteConfig::current_site_config();

        // if a current-folder exists, we assume a symlinked baseFolder like with PHP deployer
        $current = dirname(dirname(Director::baseFolder())) . '/current';
        if (is_dir($current)) {
            $base = dirname(dirname(Director::baseFolder())) . '/shared';
        } else {
            $base = Director::baseFolder();
        }

        $filename_relative  = $siteConfig->BingSiteAuthFile->Filename;
        $filename_absolute  = $base . '/public/assets/' . $filename_relative;

        $file_content = file_get_contents($filename_absolute, true);

        $this->getResponse()->addHeader("Content-Type", " text/xml; charset=utf-8");
        if (file_exists($filename_absolute) || strtolower($siteConfig->BingSiteAuthFile->getExtension()) == 'xml') {
            return $file_content;
        } else {
            return $this->httpError(404);
        }
    }
}
