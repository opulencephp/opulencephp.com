<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the builder for the docs page
 */
namespace OpulenceWebsite\HTTP\Views\Builders;

use Opulence\Views\Factories\IViewBuilder;
use Opulence\Views\IView;

class DocsBuilder implements IViewBuilder
{
    /**
     * @inheritdoc
     */
    public function build(IView $view)
    {
        $view->setVar("mainClasses", "docs");

        return $view;
    }
}