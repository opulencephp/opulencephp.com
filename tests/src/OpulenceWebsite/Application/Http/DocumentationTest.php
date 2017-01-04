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
 * Defines the documentation tests
 */
class DocumentationTest extends IntegrationTestCase
{
    /** @var DocumentationConfig The documentation config */
    private $documentationConfig = null;

    /**
     * Sets up the tests
     */
    public function setUp() : void
    {
        parent::setUp();

        $this->documentationConfig = new DocumentationConfig(
            require Config::get("paths", "config") . "/documentation.php"
        );
    }

    /**
     * Tests that the docs template is set up correctly
     */
    public function testDocsPageIsSetUpCorrectly() : void
    {
        $this->get("/docs")
            ->go()
            ->assertResponse
            ->isOK();
        $this->assertView
            ->varEquals("doFormatTitle", true)
            ->varEquals("mainClasses", "docs")
            ->varEquals("docs", $this->documentationConfig->getDocs(DocumentationConfig::DEFAULT_BRANCH))
            ->varEquals("mainClasses", "docs");
        $this->checkMasterTemplateSetup();
    }

    /**
     * Tests that a non-existent doc redirects to the default
     */
    public function testNonExistentDocIsRedirectingToDefault() : void
    {
        $this->get("/docs/master/does-not-exist")
            ->go()
            ->assertResponse
            ->redirectsTo("/docs/master/" . $this->documentationConfig->getDefaultDoc("master"));
    }

    /**
     * Tests that a non-existent doc version redirects to the default
     */
    public function testNonExistentDocVersionIsRedirectingToDefault() : void
    {
        $this->get("/docs/non-existent-version/does-not-exist")
            ->go()
            ->assertResponse
            ->redirectsTo("/docs");
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
            ])
            ->varEquals("defaultBranch", DocumentationConfig::DEFAULT_BRANCH);
    }
}