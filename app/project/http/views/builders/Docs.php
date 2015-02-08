<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines the builder for the docs page
 */
namespace Project\HTTP\Views\Builders;
use Project\Docs as ProjectDocs;
use RDev\Views;

class Docs implements Views\IBuilder
{
    /**
     * {@inheritdoc}
     */
    public function build(Views\ITemplate $template)
    {
        $template->setVar("mainClasses", "docs");
        $template->setVar("docs", ProjectDocs\Documentation::$docData);

        return $template;
    }
}