<?php

/*
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2017 David Young
 * @license   https://github.com/opulencephp/Opulence/blob/master/LICENSE.md
 */

use Opulence\Framework\Http\Middleware\CheckMaintenanceMode;
use OpulenceWebsite\Application\Http\Middleware\CheckCsrfToken;
use OpulenceWebsite\Application\Http\Middleware\Session;

/**
 * ----------------------------------------------------------
 * Define the list of middleware to be run on all routes
 * ----------------------------------------------------------
 */
return [
    CheckMaintenanceMode::class,
    Session::class,
    CheckCsrfToken::class
];
