<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the view builders bootstrapper
 */
namespace Project\Bootstrappers\HTTP\Views;
use Project\Docs\Documentation;
use Project\HTTP\Views\Builders\Docs;
use Project\HTTP\Views\Builders\Home;
use Project\HTTP\Views\Builders\Master;
use RDev\Applications\Bootstrappers\Bootstrapper;
use RDev\HTTP\Requests\Request;
use RDev\Views\Factories\ITemplateFactory;

class Builders extends Bootstrapper
{
    /**
     * Registers view builders to the factory
     *
     * @param ITemplateFactory $templateFactory The template factory to use
     * @param Request $request The current request
     * @param Documentation $docs The docs
     */
    public function run(ITemplateFactory $templateFactory, Request $request, Documentation $docs)
    {
        $templateFactory->registerBuilder("Master.php", function() use($request, $docs)
        {
            return new Master($request, $docs);
        });
        $templateFactory->registerBuilder("Home.php", function()
        {
            return new Home();
        });
        $templateFactory->registerBuilder("Docs.php", function()
        {
            return new Docs();
        });
    }
}