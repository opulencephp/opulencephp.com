<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the page tests
 */
namespace RDevWebsite\HTTP;
use Parsedown;
use RDevWebsite\Docs\Documentation;
use RDev\Files\FileSystem;

class PageTest extends ApplicationTestCase
{
    /** @var Documentation The docs */
    private $docs = null;

    /**
     * Sets up the tests
     */
    public function setUp()
    {
        parent::setUp();

        $this->docs = new Documentation(
            $this->getMock(Parsedown::class),
            $this->application->getPaths(),
            $this->getMock(FileSystem::class)
        );
    }

    /**
     * Tests that the 404 template is set up correctly
     */
    public function test404PageIsSetUpCorrectly()
    {
        $this->route("GET", "/does-not-exist");
        $this->checkMasterTemplateSetup();
        $this->assertResponseIsNotFound();
        $this->assertTemplateVarEquals("metaKeywords", []);
        $this->assertTemplateVarEquals("metaDescription", "");
        $this->assertTemplateVarEquals("doFormatTitle", true);
        $this->assertTemplateVarEquals("title", "404 Error");
        $this->assertTemplateVarEquals("mainClasses", "home");
    }

    /**
     * Tests that the docs template is set up correctly
     */
    public function testDocsPageIsSetUpCorrectly()
    {
        $this->route("GET", "/docs");
        $this->checkMasterTemplateSetup();
        $this->assertResponseIsOK();
        $this->assertTemplateVarEquals("doFormatTitle", true);
        $this->assertTemplateVarEquals("mainClasses", "docs");
        $this->assertTemplateVarEquals("docs", $this->docs->getDocs(Documentation::DEFAULT_BRANCH));
        $this->assertTemplateVarEquals("mainClasses", "docs");
    }

    /**
     * Tests that the home template is set up correctly
     */
    public function testHomePageIsSetUpCorrectly()
    {
        $this->route("GET", "/");
        $this->checkMasterTemplateSetup();
        $this->assertResponseIsOK();
        $this->assertTemplateVarEquals("doFormatTitle", false);
        $this->assertTemplateVarEquals("title", "RDev | PHP Framework");
        $this->assertTemplateVarEquals("metaKeywords", ["rdev", "php", "framework", "orm", "router", "console", "mvc"]);
        $this->assertTemplateVarEquals("metaDescription", "A simple, secure, and scalable MVC framework for PHP");
        $this->assertTemplateVarEquals("mainClasses", "home");
    }

    /**
     * Tests that a non-existent doc redirects to the default
     */
    public function testNonExistentDocIsRedirectingToDefault()
    {
        $this->route("GET", "/docs/master/does-not-exist");
        $this->assertRedirectsTo("/docs/master/" . $this->docs->getDefaultDoc("master"));
    }

    /**
     * Tests that a non-existent doc version redirects to the default
     */
    public function testNonExistentDocVersionIsRedirectingToDefault()
    {
        $this->route("GET", "/docs/non-existent-version/does-not-exist");
        $this->assertRedirectsTo("/docs");
    }

    /**
     * Tests that the master template is set up correctly
     */
    private function checkMasterTemplateSetup()
    {
        $this->assertTemplateVarEquals("masterCSS", [
            "/assets/css/style.css?v=1.3",
            "/assets/css/prism.css",
            "//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"
        ]);
        $this->assertTemplateVarEquals("javaScript", [
            "/assets/js/prism.js"
        ]);
        $this->assertTemplateVarEquals("defaultBranch", Documentation::DEFAULT_BRANCH);
    }
}