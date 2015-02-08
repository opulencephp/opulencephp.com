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
    // The directory of this project's root directory
    "root" => __DIR__ . "/..",
    // The application directory
    "app" => __DIR__ . "/../app",
    // The configs directory
    "configs" => __DIR__,
    // The path toe the vendor (Composer) directory
    "vendor" => __DIR__ . "/../vendor",
    // The path to the resources directory
    "resources" => __DIR__ . "/../resources",
    // The path to the view directory
    "views" => __DIR__ . "/../resources/views",
    // The path to the temporary directory
    "tmp" => __DIR__ . "/../tmp",
    // The path to the compiled view directory
    "compiledViews" => __DIR__ . "/../tmp/http/views",
    // The path to the logs directory
    "logs" => __DIR__ . "/../tmp/logs",
    // The path to the compiled docs directory
    "compiledDocs" => __DIR__ . "/../resources/docs"
];

// Get the autoloader
require_once $pathsConfig["vendor"] . "/autoload.php";

return new Paths($pathsConfig);