<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the template functions bootstrapper
 */
namespace RDevWebsite\Bootstrappers\HTTP\Views;
use RDev\Framework\Bootstrappers\HTTP\Views\TemplateFunctions as BaseBootstrapper;
use RDev\Routing\URL\URLGenerator;
use RDev\Sessions\ISession;
use RDev\Views\Compilers\ICompiler;

class TemplateFunctions extends BaseBootstrapper
{
    /**
     * Registers template functions
     *
     * @param ICompiler $compiler The compiler to use
     * @param URLGenerator $urlGenerator What generates URLs from routes
     * @param ISession $session The current session
     */
    public function run(ICompiler $compiler, URLGenerator $urlGenerator, ISession $session)
    {
        parent::run($compiler, $urlGenerator, $session);

        // Generates the title HTML
        $compiler->registerTemplateFunction("rdevTitle", function($title, $doFormat = true) use ($compiler)
        {
            if($doFormat)
            {
                $title .= " | RDev";
            }

            return $compiler->executeTemplateFunction("pageTitle", [$title]);
        });
        // Generates the logo text
        $compiler->registerTemplateFunction("logo", function()
        {
            return '<span class="logo">R<span class="logo-dev">Dev</span></span>';
        });
    }
}