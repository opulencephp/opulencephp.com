<?php

/*
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2021 David Young
 * @license   https://github.com/opulencephp/Opulence/blob/master/LICENSE.md
 */

use Opulence\Routing\Router;
use Project\Application\Http\Middleware\Documentation;

/**
 * ----------------------------------------------------------
 * Create all of the routes for the Http kernel
 * ----------------------------------------------------------
 *
 * @var Router $router
 */
$router->group(['controllerNamespace' => 'Project\\Application\\Http\\Controllers'], function (Router $router) {
    $router->get('/', 'Page@showHomePage', [
        'name' => 'home'
    ]);
    $router->get('/slack', 'Page@showSlackPage', [
        'name' => 'slack'
    ]);
    $router->group(['path' => '/docs'], function (Router $router) {
        $router->get('/:version/:docName', 'Documentation@showDoc', [
            'name' => 'docs',
            'middleware' => [
                Documentation::class
            ]
        ]);
        $router->get('/:docName', 'Documentation@showNoVersionDoc', [
            'name' => 'docs-noversion'
        ]);
        $router->get('', 'Documentation@showIndex', [
            'name' => 'docs-index'
        ]);
    });
});
