<?php
/**
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2017 David Young
 * @license   https://github.com/opulencephp/opulencephp.com/blob/master/LICENSE.md
 */
namespace OpulenceWebsite\Application\Http\Views\Builders;

use Opulence\Views\Factories\IViewBuilder;
use Opulence\Views\IView;

/**
 * Defines the slack page view builder
 */
class SlackBuilder implements IViewBuilder
{
    /**
     * @inheritdoc
     */
    public function build(IView $view) : IView
    {
        $view->setVar("title", "Slack");
        $view->setVar("metaKeywords", ["opulence", "slack", "chat", "php", "framework"]);
        $view->setVar("metaDescription", "Join Opulence's Slack channel");

        return $view;
    }
}