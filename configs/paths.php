<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the list of paths needed by this application
 */
use RDev\Applications\Paths;

/**
 * ----------------------------------------------------------
 * List any paths used by our application
 * ----------------------------------------------------------
 */
$pathsConfig = [
    /**
     * ----------------------------------------------------------
     * Application
     * ----------------------------------------------------------
     *
     * "app" => The application directory
     */
    "app" => __DIR__ . "/../app",

    /**
     * ----------------------------------------------------------
     * Configs
     * ----------------------------------------------------------
     *
     * "configs" => The configs directory
     * "configs.console" => The console config directory
     * "configs.http" => The HTTP config directory
     */
    "configs" => __DIR__,
    "configs.console" => __DIR__ . "/console",
    "configs.http" => __DIR__ . "/http",

    /**
     * ----------------------------------------------------------
     * Documentation
     * ----------------------------------------------------------
     *
     * "docs.compiled" => The path to the compiled docs directory
     */
    "docs.compiled" => __DIR__ . "/../resources/docs",

    /**
     * ----------------------------------------------------------
     * Logs
     * ----------------------------------------------------------
     *
     * "logs" => The logs directory
     */
    "logs" => __DIR__ . "/../tmp/logs",

    /**
     * ----------------------------------------------------------
     * Public
     * ----------------------------------------------------------
     *
     * "public" => The public directory
     */
    "public" => __DIR__ . "/../public",

    /**
     * ----------------------------------------------------------
     * Resources
     * ----------------------------------------------------------
     *
     * "resources" => The resources directory
     */
    "resources" => __DIR__ . "/../resources",

    /**
     * ----------------------------------------------------------
     * Root
     * ----------------------------------------------------------
     *
     * "root" => The root directory
     */
    "root" => __DIR__ . "/..",

    /**
     * ----------------------------------------------------------
     * Routes
     * ----------------------------------------------------------
     *
     * "routes.cache" => The cached routes directory
     */
    "routes.cache" => __DIR__ . "/../tmp/framework/http/routing",

    /**
     * ----------------------------------------------------------
     * Tests
     * ----------------------------------------------------------
     *
     * "tests" => The tests directory
     */
    "tests" => __DIR__ . "/../tests/app",

    /**
     * ----------------------------------------------------------
     * Temporary
     * ----------------------------------------------------------
     *
     * "tmp" => The temporary directory
     * "tmp.api" => The API's temporary directory
     * "tmp.docs" => The documents' temporary directory
     * "tmp.framework.console" => The framework's temporary console directory
     * "tmp.framework.http" => The framework's temporary HTTP directory
     */
    "tmp" => __DIR__ . "/../tmp",
    "tmp.api" => __DIR__ . "/../tmp/api",
    "tmp.docs" => __DIR__ . "/../tmp/docs",
    "tmp.framework.console" => __DIR__ . "/../tmp/framework/console",
    "tmp.framework.http" => __DIR__ . "/../tmp/framework/http",

    /**
     * ----------------------------------------------------------
     * Vendor
     * ----------------------------------------------------------
     *
     * "vendor" => The vendor directory
     */
    "vendor" => __DIR__ . "/../vendor",

    /**
     * ----------------------------------------------------------
     * Views
     * ----------------------------------------------------------
     *
     * "views.compiled" => The compiled views directory
     * "views.raw" => The raw views directory
     */
    "views.compiled" => __DIR__ . "/../tmp/framework/http/views",
    "views.raw" => __DIR__ . "/../resources/views"
];

// Get the autoloader
require_once $pathsConfig["vendor"] . "/autoload.php";

return new Paths($pathsConfig);