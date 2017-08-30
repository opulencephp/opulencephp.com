<?php

/*
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2017 David Young
 * @license   https://github.com/opulencephp/Opulence/blob/master/LICENSE.md
 */

namespace OpulenceWebsite\Application\Bootstrappers\Http\Views;

use Opulence\Framework\Views\Bootstrappers\ViewFunctionsBootstrapper as BaseBootstrapper;
use Opulence\Ioc\IContainer;
use Opulence\Views\Compilers\Fortune\ITranspiler;

/**
 * Defines the view functions bootstrapper
 */
class ViewFunctionsBootstrapper extends BaseBootstrapper
{
    /**
     * @inheritdoc
     */
    public function registerBindings(IContainer $container) : void
    {
        parent::registerBindings($container);

        $transpiler = $container->resolve(ITranspiler::class);

        // Generates the title HTML
        $transpiler->registerViewFunction('opulenceTitle', function ($title, $doFormat = true) use ($transpiler) {
            if ($doFormat) {
                $title .= ' | Opulence';
            }

            return $transpiler->callViewFunction('pageTitle', $title);
        });
        // Generates the logo text
        $transpiler->registerViewFunction('logo', function ($includeImage = true) {
            return '<span class="logo">' . ($includeImage ? '<img class="logo-icon" src="/assets/images/opulence-logo.png?v=1.0" alt="Opulence">' : '') . '<span class="logo-text">Opulence</span></span>';
        });
    }
}
