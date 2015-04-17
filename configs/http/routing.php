<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the routing config
 */
use RDev\HTTP\Routing\Router;
use Project\HTTP\Middleware\Docs;

/**
 * ----------------------------------------------------------
 * Create all of the routes for the HTTP kernel
 * ----------------------------------------------------------
 *
 * @var Router $router
 */
$router->group(["controllerNamespace" => "Project\\HTTP\\Controllers"], function() use ($router)
{
    $router->get("/", [
        "controller" => "Page@showHomePage",
        "name" => "home"
    ]);
    $router->group(["path" => "/docs"], function() use ($router)
    {
        $router->get("/{version}/{docName}", [
            "controller" => "Docs@showDoc",
            "name" => "docs",
            "middleware" => [
                Docs::class
            ]
        ]);
        $router->get("/{docName}", [
            "controller" => "Docs@showNoVersionDoc",
            "name" => "docs-noversion"
        ]);
        $router->get("", [
            "controller" => "Docs@showIndex",
            "name" => "docs-index"
        ]);
    });
});