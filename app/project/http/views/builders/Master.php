<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines the master template builder
 */
namespace Project\HTTP\Views\Builders;
use RDev\HTTP\Requests;
use RDev\Views;

class Master implements Views\IBuilder
{
    /** @var Requests\Request The current request */
    private $request = null;

    /**
     * @param Requests\Request $request The current request
     */
    public function __construct(Requests\Request $request)
    {
        $this->request = $request;
    }

    /**
     * {@inheritdoc}
     */
    public function build(Views\ITemplate $template)
    {
        // Default to empty meta data
        $template->setVar("metaKeywords", []);
        $template->setVar("metaDescription", "");
        // Set default variable values
        $template->setVar("doFormatTitle", true);
        $template->setVar("css", [
            "/assets/css/style.css",
            "/assets/css/prism.css"
        ]);
        $template->setVar("javaScript", [
            "/assets/js/prism.js"
        ]);
        $template->setVar("mainClasses", "home");
        $template->setVar("request", $this->request);

        return $template;
    }
}