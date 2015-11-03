<?php
/**
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2015 David Young
 * @license   https://github.com/opulencephp/Opulence/blob/master/LICENSE.md
 */
use Monolog\Logger;
use Opulence\Applications\Bootstrappers\ApplicationBinder;
use Opulence\Applications\Bootstrappers\Caching\ICache;
use Opulence\Applications\Environments\Environment;
use Opulence\Framework\Http\Kernel;
use Opulence\Http\Requests\Request;
use Opulence\Routing\Router;

require_once __DIR__ . "/../start.php";

/**
 * ----------------------------------------------------------
 * Finish configuring the bootstrappers for the Http kernel
 * ----------------------------------------------------------
 *
 * @var ApplicationBinder $applicationBinder
 */
$applicationBinder->bindToApplication(
    require __DIR__ . "/../../configs/http/bootstrappers.php",
    false,
    $application->getEnvironment()->getName() == Environment::PRODUCTION,
    $application->getPaths()["tmp.framework.http"] . "/" . ICache::DEFAULT_CACHED_REGISTRY_FILE_NAME
);

/**
 * ----------------------------------------------------------
 * Let's get started
 * ----------------------------------------------------------
 */
$application->start(function () use ($application) {
    /**
     * ----------------------------------------------------------
     * Handle the request
     * ----------------------------------------------------------
     *
     * @var Router $router
     * @var Request $request
     */
    $router = $application->getIoCContainer()->makeShared(Router::class);
    $request = $application->getIoCContainer()->makeShared(Request::class);
    $logger = require __DIR__ . "/../../configs/http/logging.php";
    $application->getIoCContainer()->bind(Logger::class, $logger);
    $kernel = new Kernel($application->getIoCContainer(), $router, $logger);
    $kernel->addMiddleware(require __DIR__ . "/../../configs/http/middleware.php");
    $response = $kernel->handle($request);
    $response->send();
});

/**
 * ----------------------------------------------------------
 * Shut her down
 * ----------------------------------------------------------
 */
$application->shutdown();