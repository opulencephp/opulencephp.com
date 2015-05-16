<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the home page template builder
 */
namespace RDevWebsite\HTTP\Views\Builders;
use RDev\Views\IBuilder;
use RDev\Views\ITemplate;

class Home implements IBuilder
{
    /**
     * {@inheritdoc}
     */
    public function build(ITemplate $template)
    {
        $template->setVar("title", "RDev | PHP Framework");
        $template->setVar("doFormatTitle", false);
        $template->setVar("metaKeywords", ["rdev", "php", "framework", "orm", "router", "console", "mvc"]);
        $template->setVar("metaDescription", "A simple, secure, and scalable MVC framework for PHP");

        return $template;
    }
}