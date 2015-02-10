<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the view builders bootstrapper
 */
namespace Project\Bootstrappers\HTTP\Views;
use Project\HTTP\Views\Builders as ViewBuilders;
use RDev\Applications\Bootstrappers;
use RDev\HTTP\Requests;
use RDev\Views\Factories;

class Builders extends Bootstrappers\Bootstrapper
{
    /**
     * Registers view builders to the factory
     *
     * @param Factories\ITemplateFactory $templateFactory The template factory to use
     * @param Requests\Request $request The current request
     */
    public function run(Factories\ITemplateFactory $templateFactory, Requests\Request $request)
    {
        $templateFactory->registerBuilder("Master.php", function() use($request)
        {
            return new ViewBuilders\Master($request);
        });
        $templateFactory->registerBuilder("Home.php", function()
        {
            return new ViewBuilders\Home();
        });
        $templateFactory->registerBuilder("Docs.php", function()
        {
            return new ViewBuilders\Docs();
        });
    }
}