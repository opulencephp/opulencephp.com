<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the routing config
 */
use Opulence\Routing\Router;
use OpulenceWebsite\HTTP\Middleware\Docs;

/**
 * ----------------------------------------------------------
 * Create all of the routes for the HTTP kernel
 * ----------------------------------------------------------
 *
 * @var Router $router
 */
$router->group(["controllerNamespace" => "OpulenceWebsite\\HTTP\\Controllers"], function () use ($router) {
    $router->get("/", "Page@showHomePage", [
        "name" => "home"
    ]);
    $router->group(["path" => "/docs"], function () use ($router) {
        $router->get("/:version/:docName", "Docs@showDoc", [
            "name" => "docs",
            "middleware" => [
                Docs::class
            ]
        ]);
        $router->get("/:docName", "Docs@showNoVersionDoc", [
            "name" => "docs-noversion"
        ]);
        $router->get("", "Docs@showIndex", [
            "name" => "docs-index"
        ]);
    });
});