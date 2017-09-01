<?php

/*
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2017 David Young
 * @license   https://github.com/opulencephp/Opulence/blob/master/LICENSE.md
 */

namespace Project\Application\Bootstrappers\Http\Views;

use Opulence\Http\Requests\Request;
use Opulence\Ioc\Bootstrappers\Bootstrapper;
use Opulence\Ioc\IContainer;
use Opulence\Views\Factories\IViewFactory;
use Opulence\Views\IView;
use Project\Application\Config\DocumentationConfig;
use Project\Application\Http\Views\Builders\DocsBuilder;
use Project\Application\Http\Views\Builders\HomeBuilder;
use Project\Application\Http\Views\Builders\HtmlErrorBuilder;
use Project\Application\Http\Views\Builders\MasterBuilder;
use Project\Application\Http\Views\Builders\SlackBuilder;

/**
 * Defines the view builders bootstrapper
 */
class BuildersBootstrapper extends Bootstrapper
{
    /**
     * @inheritdoc
     */
    public function registerBindings(IContainer $container) : void
    {
        $viewFactory = $container->resolve(IViewFactory::class);
        $request = $container->resolve(Request::class);
        $documentationConfig = $container->resolve(DocumentationConfig::class);

        $viewFactory->registerBuilder('Master', function (IView $view) use ($request, $documentationConfig) {
            return (new MasterBuilder($request, $documentationConfig))->build($view);
        });
        $viewFactory->registerBuilder('Home', function (IView $view) {
            return (new HomeBuilder())->build($view);
        });
        $viewFactory->registerBuilder('Slack', function (IView $view) {
            return (new SlackBuilder())->build($view);
        });
        $viewFactory->registerBuilder('Docs', function (IView $view) {
            return (new DocsBuilder())->build($view);
        });
        $viewFactory->registerBuilder('errors/html/Error', function (IView $view) {
            return (new HtmlErrorBuilder())->build($view);
        });
    }
}
