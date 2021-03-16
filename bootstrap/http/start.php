<?php

/*
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2021 David Young
 * @license   https://github.com/opulencephp/Opulence/blob/master/LICENSE.md
 */

use Opulence\Environments\Environment;
use Opulence\Framework\Configuration\Config;
use Opulence\Framework\Http\Kernel;
use Opulence\Http\Requests\Request;
use Opulence\Ioc\Bootstrappers\Caching\FileCache;
use Opulence\Ioc\Bootstrappers\Dispatchers\BootstrapperDispatcher;
use Opulence\Ioc\Bootstrappers\Dispatchers\IBootstrapperDispatcher;
use Opulence\Ioc\Bootstrappers\Factories\BootstrapperRegistryFactory;
use Opulence\Ioc\Bootstrappers\Factories\CachedBootstrapperRegistryFactory;
use Opulence\Ioc\Bootstrappers\IBootstrapperRegistry;
use Opulence\Routing\Router;

/**
 * ----------------------------------------------------------
 * Create your paths
 * ----------------------------------------------------------
 */
$paths = require_once __DIR__ . '/../../config/paths.php';

/**
 * ----------------------------------------------------------
 * Autoload your dependencies
 * ----------------------------------------------------------
 */
require "{$paths['vendor']}/autoload.php";

/**
 * ----------------------------------------------------------
 * Set up the environment
 * ----------------------------------------------------------
 */
require __DIR__ . '/../../config/environment.php';

/**
 * ----------------------------------------------------------
 * Set up the exception and error handlers
 * ----------------------------------------------------------
 */
require __DIR__ . '/../../config/application.php';
$logger = require __DIR__ . '/../../config/http/logging.php';
$exceptionHandler = require_once __DIR__ . '/../../config/http/exceptions.php';
$errorHandler = require_once __DIR__ . '/../../config/http/errors.php';
$exceptionHandler->register();
$errorHandler->register();

/**
 * ----------------------------------------------------------
 * Load some HTTP-specific config settings
 * ----------------------------------------------------------
 */
Config::setCategory('routing', require_once Config::get('paths', 'config.http') . '/routing.php');
Config::setCategory('sessions', require_once Config::get('paths', 'config.http') . '/sessions.php');

/**
 * ----------------------------------------------------------
 * Configure the bootstrappers for the HTTP kernel
 * ----------------------------------------------------------
 */
$httpBootstrapperPath = Config::get('paths', 'config.http') . '/bootstrappers.php';
$httpBootstrappers = require $httpBootstrapperPath;
$allBootstrappers = array_merge($globalBootstrappers, $httpBootstrappers);

// If you should cache your bootstrapper registry
if (Environment::getVar('ENV_NAME') == Environment::PRODUCTION) {
    $bootstrapperCache = new FileCache(
        Config::get('paths', 'tmp.framework.http') . '/cachedBootstrapperRegistry.json'
    );
    $bootstrapperFactory = new CachedBootstrapperRegistryFactory($bootstrapperResolver, $bootstrapperCache);
    $bootstrapperRegistry = $bootstrapperFactory->createBootstrapperRegistry($allBootstrappers);
} else {
    $bootstrapperFactory = new BootstrapperRegistryFactory($bootstrapperResolver);
    $bootstrapperRegistry = $bootstrapperFactory->createBootstrapperRegistry($allBootstrappers);
}

$bootstrapperDispatcher = new BootstrapperDispatcher($container, $bootstrapperRegistry, $bootstrapperResolver);
$container->bindInstance(IBootstrapperRegistry::class, $bootstrapperRegistry);
$container->bindInstance(IBootstrapperDispatcher::class, $bootstrapperDispatcher);

/**
 * ----------------------------------------------------------
 * Handle the request
 * ----------------------------------------------------------
 *
 * @var Router $router
 * @var Request $request
 */
$bootstrapperDispatcher->dispatch(false);
$router = $container->resolve(Router::class);
$request = $container->resolve(Request::class);
$kernel = new Kernel($container, $router, $exceptionHandler, $exceptionRenderer);
$kernel->addMiddleware(require_once Config::get('paths', 'config.http') . '/middleware.php');
$response = $kernel->handle($request);
$response->send();
