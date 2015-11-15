<?php
/**
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2015 David Young
 * @license   https://github.com/opulencephp/opulencephp.com/blob/master/LICENSE.md
 */
use OpulenceWebsite\Http\Middleware\CheckCsrfToken;
use OpulenceWebsite\Http\Middleware\Session;

/**
 * ----------------------------------------------------------
 * Define the list of middleware to be run on all routes
 * ----------------------------------------------------------
 */
return [
    /**
     * ----------------------------------------------------------
     * Middleware to be run on every route
     * ----------------------------------------------------------
     *
     * List any Http middleware you'd like here
     */
    Session::class,
    CheckCsrfToken::class
];