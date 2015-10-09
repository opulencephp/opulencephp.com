<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the view builders bootstrapper
 */
namespace OpulenceWebsite\Bootstrappers\HTTP\Views;

use OpulenceWebsite\Docs\Documentation;
use OpulenceWebsite\HTTP\Views\Builders\DocsBuilder;
use OpulenceWebsite\HTTP\Views\Builders\HomeBuilder;
use OpulenceWebsite\HTTP\Views\Builders\MasterBuilder;
use Opulence\Applications\Bootstrappers\Bootstrapper;
use Opulence\HTTP\Requests\Request;
use Opulence\Views\Factories\IViewFactory;
use Opulence\Views\IView;

class BuildersBootstrapper extends Bootstrapper
{
    /**
     * Registers view builders to the factory
     *
     * @param IViewFactory $viewFactory The view factory to use
     * @param Request $request The current request
     * @param Documentation $docs The docs
     */
    public function run(IViewFactory $viewFactory, Request $request, Documentation $docs)
    {
        $viewFactory->registerBuilder("Master", function (IView $view) use ($request, $docs) {
            return (new MasterBuilder($request, $docs))->build($view);
        });
        $viewFactory->registerBuilder("Home", function (IView $view) {
            return (new HomeBuilder())->build($view);
        });
        $viewFactory->registerBuilder("Docs", function (IView $view) {
            return (new DocsBuilder())->build($view);
        });
    }
}