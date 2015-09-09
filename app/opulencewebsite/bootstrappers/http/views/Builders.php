<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the view builders bootstrapper
 */
namespace OpulenceWebsite\Bootstrappers\HTTP\Views;
use OpulenceWebsite\Docs\Documentation;
use OpulenceWebsite\HTTP\Views\Builders\Docs;
use OpulenceWebsite\HTTP\Views\Builders\Home;
use OpulenceWebsite\HTTP\Views\Builders\Master;
use Opulence\Applications\Bootstrappers\Bootstrapper;
use Opulence\HTTP\Requests\Request;
use Opulence\Views\Factories\IViewFactory;

class Builders extends Bootstrapper
{
    /**
     * Registers view builders to the factory
     *
     * @param IViewFactory $templateFactory The template factory to use
     * @param Request $request The current request
     * @param Documentation $docs The docs
     */
    public function run(IViewFactory $templateFactory, Request $request, Documentation $docs)
    {
        $templateFactory->registerBuilder("Master", function() use($request, $docs)
        {
            return new Master($request, $docs);
        });
        $templateFactory->registerBuilder("Home", function()
        {
            return new Home();
        });
        $templateFactory->registerBuilder("Docs", function()
        {
            return new Docs();
        });
    }
}