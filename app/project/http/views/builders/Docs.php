<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines the builder for the docs page
 */
namespace Project\HTTP\Views\Builders;
use Project\Docs\Documentation;
use RDev\Views\IBuilder;
use RDev\Views\ITemplate;

class Docs implements IBuilder
{
    /**
     * {@inheritdoc}
     */
    public function build(ITemplate $template)
    {
        $template->setVar("mainClasses", "docs");
        $template->setVar("docs", Documentation::$docData);

        return $template;
    }
}