<?php
/**
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2015 David Young
 * @license   https://github.com/opulencephp/Opulence/blob/master/LICENSE.md
 */
namespace OpulenceWebsite\Http\Views\Builders;

use Opulence\Views\Factories\IViewBuilder;
use Opulence\Views\IView;

/**
 * Defines the homepage view builder
 */
class  HomeBuilder implements IViewBuilder
{
    /**
     * @inheritdoc
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