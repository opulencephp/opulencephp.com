<?php
/**
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2016 David Young
 * @license   https://github.com/opulencephp/opulencephp.com/blob/master/LICENSE.md
 */
use Opulence\Framework\Bootstrappers\Http\Requests\RequestBootstrapper;
use OpulenceWebsite\Application\Bootstrappers\Http\Routing\RouterBootstrapper;
use OpulenceWebsite\Application\Bootstrappers\Http\Sessions\SessionBootstrapper;
use OpulenceWebsite\Application\Bootstrappers\Http\Views\BuildersBootstrapper;
use OpulenceWebsite\Application\Bootstrappers\Http\Views\ViewBootstrapper;
use OpulenceWebsite\Application\Bootstrappers\Http\Views\ViewFunctionsBootstrapper;

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