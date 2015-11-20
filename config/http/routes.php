<?php
/**
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2015 David Young
 * @license   https://github.com/opulencephp/opulencephp.com/blob/master/LICENSE.md
 */
use Opulence\Routing\Router;
use OpulenceWebsite\Http\Middleware\Documentation;

/**
 * ----------------------------------------------------------
 * Create all of the routes for the Http kernel
 * ----------------------------------------------------------
 *
 * @var Router $router
 */
$router->group(["controllerNamespace" => "OpulenceWebsite\\Http\\Controllers"], function () use ($router) {
    $router->get("/", "Page@showHomePage", [
        "name" => "home"
    ]);
    $router->group(["path" => "/docs"], function () use ($router) {
        $router->get("/:version/:docName", "Documentation@showDoc", [
            "name" => "docs",
            "middleware" => [
                Documentation::class
            ]
        ]);
        $router->get("/:docName", "Documentation@showNoVersionDoc", [
            "name" => "docs-noversion"
        ]);
        $router->get("", "Documentation@showIndex", [
            "name" => "docs-index"
        ]);
    });
});