<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the home page template builder
 */
namespace OpulenceWebsite\HTTP\Views\Builders;
use Opulence\Views\Factories\IViewBuilder;
use Opulence\Views\IView;

class Home implements IViewBuilder
{
    /**
     * {@inheritdoc}
     */
    public function build(IView $view)
    {
        $view->setVar("title", "Opulence | PHP Framework");
        $view->setVar("doFormatTitle", false);
        $view->setVar("metaKeywords", ["opulence", "php", "framework", "orm", "router", "console", "mvc"]);
        $view->setVar("metaDescription", "A simple, secure, and scalable MVC framework for PHP");

        return $view;
    }
}