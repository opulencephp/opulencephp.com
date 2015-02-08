<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the home page template builder
 */
namespace Project\HTTP\Views\Builders;
use RDev\Views;

class Home implements Views\IBuilder
{
    /**
     * {@inheritdoc}
     */
    public function build(Views\ITemplate $template)
    {
        $template->setVar("title", "RDev");
        $template->setVar("metaKeywords", ["rdev", "php", "framework", "orm", "router", "console", "mvc"]);
        $template->setVar("metaDescription", "RDev is a simple, secure, and scalable PHP framework");

        return $template;
    }
}