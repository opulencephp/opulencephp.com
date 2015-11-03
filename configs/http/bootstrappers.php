<?php
/**
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2015 David Young
 * @license   https://github.com/opulencephp/Opulence/blob/master/LICENSE.md
 */
use OpulenceWebsite\Bootstrappers\Http\Routing\RouterBootstrapper;
use OpulenceWebsite\Bootstrappers\Http\Sessions\SessionBootstrapper;
use OpulenceWebsite\Bootstrappers\Http\Views\BuildersBootstrapper;
use OpulenceWebsite\Bootstrappers\Http\Views\ViewBootstrapper;
use OpulenceWebsite\Bootstrappers\Http\Views\ViewFunctionsBootstrapper;
use Opulence\Framework\Bootstrappers\Http\Requests\RequestBootstrapper;

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