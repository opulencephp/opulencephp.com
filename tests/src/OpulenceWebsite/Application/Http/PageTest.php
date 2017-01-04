<?php
/**
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2017 David Young
 * @license   https://github.com/opulencephp/opulencephp.com/blob/master/LICENSE.md
 */
namespace OpulenceWebsite\Application\Http;

use Opulence\Framework\Configuration\Config;
use OpulenceWebsite\Application\Config\DocumentationConfig;

/**
 * Defines the page tests
 */
class PageTest extends IntegrationTestCase
{
    /**
     * Tests that the 404 template is set up correctly
     */
    public function test404PageIsSetUpCorrectly() : void
    {
        $this->get("/does-not-exist")
            ->go()
            ->assertResponse
            ->isNotFound();
    }

    /**
     * Tests that the home page is set up correctly
     */
    public function testHomePageIsSetUpCorrectly() : void
    {
        $this->get("/")
            ->go()
            ->assertResponse
            ->isOK();
        $this->assertView
            ->varEquals("doFormatTitle", false)
            ->varEquals("title", "Opulence | PHP Framework")
            ->varEquals("metaKeywords", ["opulence", "php", "framework", "orm", "router", "console", "mvc"])
            ->varEquals("metaDescription", "A simple, secure, and scalable MVC framework for PHP 7")
            ->varEquals("mainClasses", "home");
        $this->checkMasterTemplateSetup();
    }

    /**
     * Tests that the slack page is set up correctly
     */
    public function testSlackPageIsSetUpCorrectly() : void
    {
        $this->get("/slack")
            ->go()
            ->assertResponse
            ->isOK();
        $this->assertView
            ->varEquals("doFormatTitle", true)
            ->varEquals("title", "Slack")
            ->varEquals("metaKeywords", ["opulence", "slack", "chat", "php", "framework"])
            ->varEquals("metaDescription", "Join Opulence's Slack channel");
        $this->checkMasterTemplateSetup();
    }

    /**
     * Tests that the master template is set up correctly
     */
    private function checkMasterTemplateSetup() : void
    {
        $this->assertView
            ->varEquals("masterCSS", [
                "/assets/css/style.css?v=1.19",
                "/assets/css/prism.css",
                "//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"
            ])
            ->varEquals("javaScript", [
                "/assets/js/prism.js"
            ]);
    }
}