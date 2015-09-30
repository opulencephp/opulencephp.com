<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines the master view builder
 */
namespace OpulenceWebsite\HTTP\Views\Builders;
use OpulenceWebsite\Docs\Documentation;
use Opulence\HTTP\Requests\Request;
use Opulence\Views\Factories\IViewBuilder;
use Opulence\Views\IView;

class MasterBuilder implements IViewBuilder
{
    /** @var Request The current request */
    private $request = null;
    /** @var Documentation The docs */
    private $docs = null;

    /**
     * @param Request $request The current request
     * @param Documentation $docs The docs
     */
    public function __construct(Request $request, Documentation $docs)
    {
        $this->request = $request;
        $this->docs = $docs;
    }

    /**
     * @inheritdoc
     */
    public function build(IView $view)
    {
        $view->setVar("foo", rand(0, 100));
        // Default to empty meta data
        $view->setVar("metaKeywords", []);
        $view->setVar("metaDescription", "");
        // Set default variable values
        $view->setVar("doFormatTitle", true);
        $view->setVar("masterCSS", [
            "/assets/css/style.css?v=1.6",
            "/assets/css/prism.css",
            "//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"
        ]);
        $view->setVar("javaScript", [
            "/assets/js/prism.js"
        ]);
        $view->setVar("mainClasses", "home");
        $view->setVar("branchTitles", $this->docs->getBranchTitles());
        $view->setVar("request", $this->request);
        $view->setVar("defaultBranch", Documentation::DEFAULT_BRANCH);

        return $view;
    }
}