<?php
/**
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2015 David Young
 * @license   https://github.com/opulencephp/opulencephp.com/blob/master/LICENSE.md
 */
use Opulence\Applications\Environments\Environment;
use Opulence\Applications\Environments\Hosts\HostRegex;
use Opulence\Applications\Environments\Resolvers\EnvironmentResolver;

/**
 * ----------------------------------------------------------
 * Register the hosts
 * ----------------------------------------------------------
 */
$environmentResolver = new EnvironmentResolver();
$environmentResolver->registerHost("production", [
    // Add any production hosts here
    new HostRegex("^.*$")
]);
$environmentResolver->registerHost("staging", [
    // Add any staging hosts here
]);
$environmentResolver->registerHost("testing", [
    // Add any testing hosts here
]);
$environmentResolver->registerHost("development", [
    // Add any development hosts here
]);
$environment = new Environment($environmentResolver->resolve(gethostname()));

/**
 * ----------------------------------------------------------
 * Load environment variables for non-production environments
 * ----------------------------------------------------------
 *
 * Note:  For performance in production, it's highly suggested
 * you set environment variables on the server itself
 */
foreach (glob(__DIR__ . "/environment/.env.*.php") as $environmentFile) {
    if (basename($environmentFile) != ".env.example.php") {
        require $environmentFile;
    }
}

return $environment;