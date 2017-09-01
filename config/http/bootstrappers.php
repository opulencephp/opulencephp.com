<?php

/*
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2017 David Young
 * @license   https://github.com/opulencephp/Opulence/blob/master/LICENSE.md
 */

use Opulence\Framework\Http\Bootstrappers\RequestBootstrapper;
use Project\Application\Bootstrappers\Http\Routing\RouterBootstrapper;
use Project\Application\Bootstrappers\Http\Sessions\SessionBootstrapper;
use Project\Application\Bootstrappers\Http\Views\BuildersBootstrapper;
use Project\Application\Bootstrappers\Http\Views\ViewBootstrapper;
use Project\Application\Bootstrappers\Http\Views\ViewFunctionsBootstrapper;

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
