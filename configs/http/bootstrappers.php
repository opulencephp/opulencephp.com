<?php
/**
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2015 David Young
 * @license   https://github.com/opulencephp/opulencephp.com/blob/master/LICENSE.md
 */
use Opulence\Framework\Bootstrappers\Http\Requests\RequestBootstrapper;
use OpulenceWebsite\Bootstrappers\Http\Routing\RouterBootstrapper;
use OpulenceWebsite\Bootstrappers\Http\Sessions\SessionBootstrapper;
use OpulenceWebsite\Bootstrappers\Http\Views\BuildersBootstrapper;
use OpulenceWebsite\Bootstrappers\Http\Views\ViewBootstrapper;
use OpulenceWebsite\Bootstrappers\Http\Views\ViewFunctionsBootstrapper;

/**
 * ----------------------------------------------------------
 * Define the bootstrapper classes for an Http application
 * ----------------------------------------------------------
 */
return [
    RequestBootstrapper::class,
    RouterBootstrapper::class,
    SessionBootstrapper::class,
    ViewBootstrapper::class,
    BuildersBootstrapper::class,
    ViewFunctionsBootstrapper::class
];