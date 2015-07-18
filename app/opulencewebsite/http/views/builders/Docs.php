<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines the builder for the docs page
 */
namespace OpulenceWebsite\HTTP\Views\Builders;
use Opulence\Views\IBuilder;
use Opulence\Views\ITemplate;

class Docs implements IBuilder
{
    /**
     * {@inheritdoc}
     */
    public function build(ITemplate $template)
    {
        $template->setVar("mainClasses", "docs");

        return $template;
    }
}