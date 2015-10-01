<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the view functions bootstrapper
 */
namespace OpulenceWebsite\Bootstrappers\HTTP\Views;

use Opulence\Framework\Bootstrappers\HTTP\Views\ViewFunctions as BaseBootstrapper;
use Opulence\Routing\URL\URLGenerator;
use Opulence\Sessions\ISession;
use Opulence\Views\Compilers\Fortune\ITranspiler;

class ViewFunctions extends BaseBootstrapper
{
    /**
     * Registers view functions
     *
     * @param ITranspiler $transpiler The transpiler to use
     * @param URLGenerator $urlGenerator What generates URLs from routes
     * @param ISession $session The current session
     */
    public function run(ITranspiler $transpiler, URLGenerator $urlGenerator, ISession $session)
    {
        parent::run($transpiler, $urlGenerator, $session);

        // Generates the title HTML
        $transpiler->registerViewFunction("opulenceTitle", function($title, $doFormat = true) use ($transpiler)
        {
            if($doFormat)
            {
                $title .= " | Opulence";
            }

            return $transpiler->callViewFunction("pageTitle", $title);
        });
        // Generates the logo text
        $transpiler->registerViewFunction("logo", function($includeImage = true)
        {
            return '<span class="logo">' . ($includeImage ? '<img class="logo-icon" src="/assets/images/opulence-logo.png" alt="Opulence">' : '') . '<span class="logo-text">Opulence</span></span>';
        });
    }
}