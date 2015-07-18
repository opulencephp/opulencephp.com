<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the environment config
 */
use Opulence\Applications\Environments\Environment;
use Opulence\Applications\Environments\EnvironmentDetector;
use Opulence\Applications\Environments\Hosts\HostRegex;

/**
 * ----------------------------------------------------------
 * Register the hosts
 * ----------------------------------------------------------
 */
$detector = new EnvironmentDetector();
$detector->registerHost("production", [
    // Add any production hosts here
    new HostRegex("^.*$")
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