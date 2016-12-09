<?php
/**
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2016 David Young
 * @license   https://github.com/opulencephp/opulencephp.com/blob/master/LICENSE.md
 */
namespace OpulenceWebsite\Application\Http\Views\Builders;

use Opulence\Http\Requests\Request;
use Opulence\Views\Factories\IViewBuilder;
use Opulence\Views\IView;
use OpulenceWebsite\Application\Config\DocumentationConfig;

/**
 * Defines the master view builder
 */
class MasterBuilder implements IViewBuilder
{
    /** @var Request The current request */
    private $request = null;
    /** @var DocumentationConfig The documentation config */
    private $documentationConfig = null;

    /**
     * @param Request $request The current request
     * @param DocumentationConfig $documentationConfig The documentation config
     */
    public function __construct(Request $request, DocumentationConfig $documentationConfig)
    {
        $this->request = $request;
        $this->documentationConfig = $documentationConfig;
    }

    /**
     * @inheritdoc
     */
    public function build(IView $view) : IView
    {
        $view->setVar("title", "Opulence");
        // Default to empty meta data
        $view->setVar("metaKeywords", []);
        $view->setVar("metaDescription", "");
        // Set default variable values
        $view->setVar("doFormatTitle", true);
        $view->setVar("masterCSS", [
            "/assets/css/style.css?v=1.15",
            "/assets/css/prism.css",
            "//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"
        ]);
        $view->setVar("javaScript", [
            "/assets/js/prism.js"
        ]);
        $view->setVar("mainClasses", "home");
        $view->setVar("branchTitles", $this->documentationConfig->getBranchTitles());
        $view->setVar("request", $this->request);
        $view->setVar("defaultBranch", DocumentationConfig::DEFAULT_BRANCH);

        return $view;
    }
}