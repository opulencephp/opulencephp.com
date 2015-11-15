<?php
/**
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2015 David Young
 * @license   https://github.com/opulencephp/opulencephp.com/blob/master/LICENSE.md
 */
namespace OpulenceWebsite\Bootstrappers\Http\Views;

use Opulence\Framework\Bootstrappers\Http\Views\ViewFunctionsBootstrapper as BaseBootstrapper;
use Opulence\Routing\Url\UrlGenerator;
use Opulence\Sessions\ISession;
use Opulence\Views\Compilers\Fortune\ITranspiler;

/**
 * Defines the view functions bootstrapper
 */
class ViewFunctionsBootstrapper extends BaseBootstrapper
{
    /**
     * Registers view functions
     *
     * @param ITranspiler $transpiler The transpiler to use
     * @param UrlGenerator $urlGenerator What generates URLs from routes
     * @param ISession $session The current session
     */
    public function run(ITranspiler $transpiler, UrlGenerator $urlGenerator, ISession $session)
    {
        parent::run($transpiler, $urlGenerator, $session);

        // Generates the title HTML
        $transpiler->registerViewFunction("opulenceTitle", function ($title, $doFormat = true) use ($transpiler) {
            if ($doFormat) {
                $title .= " | Opulence";
            }

            return $transpiler->callViewFunction("pageTitle", $title);
        });
        // Generates the logo text
        $transpiler->registerViewFunction("logo", function ($includeImage = true) {
            return '<span class="logo">' . ($includeImage ? '<img class="logo-icon" src="/assets/images/opulence-logo.png" alt="Opulence">' : '') . '<span class="logo-text">Opulence</span></span>';
        });
    }
}