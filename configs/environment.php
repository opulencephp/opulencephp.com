<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the environment config
 */
use RDev\Applications\Environments\Environment;
use RDev\Applications\Environments\EnvironmentDetector;
use RDev\Applications\Environments\Hosts\HostRegex;

/**
 * ----------------------------------------------------------
 * Create the environment registry
 * ----------------------------------------------------------
 */
$detector = new EnvironmentDetector();
$detector->registerHost("production", [
    // Add any production hosts here
    new HostRegex("^.*$", true)
]);
$detector->registerHost("staging", [
    // Add any staging hosts here
]);
$detector->registerHost("testing", [
    // Add any testing hosts here
]);
$detector->registerHost("development", [
    // Add any development hosts here
]);
$environmentName = $detector->detect();
$environment = new Environment($environmentName);

/**
 * ----------------------------------------------------------
 * Load environment variables for non-production environments
 * ----------------------------------------------------------
 *
 * Note:  For performance in production, it's highly suggested
 * you set environment variables on the server itself
 */
foreach(glob(__DIR__ . "/environment/.env.*.php") as $environmentFile)
{
    if(basename($environmentFile) != ".env.example.php")
    {
        require $environmentFile;
    }
}

return $environment;