<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines the master template builder
 */
namespace RDevWebsite\HTTP\Views\Builders;
use RDevWebsite\Docs\Documentation;
use RDev\HTTP\Requests\Request;
use RDev\Views\IBuilder;
use RDev\Views\ITemplate;

class Master implements IBuilder
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
     * {@inheritdoc}
     */
    public function build(ITemplate $template)
    {
        // Default to empty meta data
        $template->setVar("metaKeywords", []);
        $template->setVar("metaDescription", "");
        // Set default variable values
        $template->setVar("doFormatTitle", true);
        $template->setVar("masterCSS", [
            "/assets/css/style.css?v=1.5",
            "/assets/css/prism.css",
            "//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"
        ]);
        $template->setVar("javaScript", [
            "/assets/js/prism.js"
        ]);
        $template->setVar("mainClasses", "home");
        $template->setVar("branchTitles", $this->docs->getBranchTitles());
        $template->setVar("request", $this->request);
        $template->setVar("defaultBranch", Documentation::DEFAULT_BRANCH);

        return $template;
    }
}