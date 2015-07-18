<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the home page template builder
 */
namespace OpulenceWebsite\HTTP\Views\Builders;
use Opulence\Views\IBuilder;
use Opulence\Views\ITemplate;

class Home implements IBuilder
{
    /**
     * {@inheritdoc}
     */
    public function build(ITemplate $template)
    {
        $template->setVar("title", "Opulence | PHP Framework");
        $template->setVar("doFormatTitle", false);
        $template->setVar("metaKeywords", ["opulence", "php", "framework", "orm", "router", "console", "mvc"]);
        $template->setVar("metaDescription", "A simple, secure, and scalable MVC framework for PHP");

        return $template;
    }
}