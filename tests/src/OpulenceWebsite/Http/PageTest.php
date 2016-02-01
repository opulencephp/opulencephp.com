<?php
/**
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2016 David Young
 * @license   https://github.com/opulencephp/opulencephp.com/blob/master/LICENSE.md
 */
namespace OpulenceWebsite\Http;

use Opulence\Files\FileSystem;
use OpulenceWebsite\Documentation\Documentation;
use Parsedown;

/**
 * Defines the page tests
 */
class PageTest extends IntegrationTestCase
{
    /** @var Documentation The docs */
    private $docs = null;

    /**
     * Sets up the tests
     */
    public function setUp()
    {
        parent::setUp();

        $paths = require __DIR__ . "/../../../../config/paths.php";
        $this->docs = new Documentation(
            require "{$paths["config"]}/documentation.php",
            $this->getMock(Parsedown::class),
            $paths,
            $this->getMock(FileSystem::class)
        );
    }

    /**
     * Tests that the 404 template is set up correctly
     */
    public function test404PageIsSetUpCorrectly()
    {
        $this->get("/does-not-exist")
            ->go()
            ->assertResponse
            ->isNotFound();
    }

    /**
     * Tests that the docs template is set up correctly
     */
    public function testDocsPageIsSetUpCorrectly()
    {
        $this->get("/docs")
            ->go()
            ->assertResponse
            ->isOK();
        $this->assertView
            ->varEquals("doFormatTitle", true)
            ->varEquals("mainClasses", "docs")
            ->varEquals("docs", $this->docs->getDocs(Documentation::DEFAULT_BRANCH))
            ->varEquals("mainClasses", "docs");
        $this->checkMasterTemplateSetup();
    }

    /**
     * Tests that the home template is set up correctly
     */
    public function testHomePageIsSetUpCorrectly()
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
     * Tests that a non-existent doc redirects to the default
     */
    public function testNonExistentDocIsRedirectingToDefault()
    {
        $this->get("/docs/master/does-not-exist")
            ->go()
            ->assertResponse
            ->redirectsTo("/docs/master/" . $this->docs->getDefaultDoc("master"));
    }

    /**
     * Tests that a non-existent doc version redirects to the default
     */
    public function testNonExistentDocVersionIsRedirectingToDefault()
    {
        $this->get("/docs/non-existent-version/does-not-exist")
            ->go()
            ->assertResponse
            ->redirectsTo("/docs");
    }

    /**
     * Tests that the master template is set up correctly
     */
    private function checkMasterTemplateSetup()
    {
        $this->assertView
            ->varEquals("masterCSS", [
                "/assets/css/style.css?v=1.9",
                "/assets/css/prism.css",
                "//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"
            ])
            ->varEquals("javaScript", [
                "/assets/js/prism.js"
            ])
            ->varEquals("defaultBranch", Documentation::DEFAULT_BRANCH);
    }
}