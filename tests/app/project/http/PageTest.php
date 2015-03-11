<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the page tests
 */
namespace Project\HTTP;
use Project\Docs;

class PageTest extends HTTPApplicationTestCase
{
    /**
     * Tests that the 404 template is set up correctly
     */
    public function test404PageIsSetUpCorrectly()
    {
        $this->route("GET", "/doesNotExist");
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
        $this->assertTemplateVarEquals("docs", Docs\Documentation::$docData);
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
        $this->assertTemplateVarEquals("metaDescription", "A simple, secure, and scalable MVC PHP framework");
        $this->assertTemplateVarEquals("mainClasses", "home");
    }

    /**
     * Tests that the master template is set up correctly
     */
    private function checkMasterTemplateSetup()
    {
        $this->assertTemplateVarEquals("css", [
            "/assets/css/style.css",
            "/assets/css/prism.css"
        ]);
        $this->assertTemplateVarEquals("javaScript", [
            "/assets/js/prism.js"
        ]);
    }
}