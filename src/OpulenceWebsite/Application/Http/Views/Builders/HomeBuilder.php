<?php
/**
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2016 David Young
 * @license   https://github.com/opulencephp/opulencephp.com/blob/master/LICENSE.md
 */
namespace OpulenceWebsite\Application\Http\Views\Builders;

use Opulence\Views\Factories\IViewBuilder;
use Opulence\Views\IView;

/**
 * Defines the homepage view builder
 */
class HomeBuilder implements IViewBuilder
{
    /**
     * @inheritdoc
     */
    public function build(IView $view) : IView
    {
        $view->setVar("title", "Opulence | PHP Framework");
        $view->setVar("doFormatTitle", false);
        $view->setVar("metaKeywords", ["opulence", "php", "framework", "orm", "router", "console", "mvc"]);
        $view->setVar("metaDescription", "A simple, secure, and scalable MVC framework for PHP 7");

        return $view;
    }
}