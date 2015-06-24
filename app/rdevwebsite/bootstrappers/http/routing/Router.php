<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the router bootstrapper
 */
namespace RDevWebsite\Bootstrappers\HTTP\Routing;
use RDevWebsite\HTTP\Controllers\Page;
use RDev\Framework\Bootstrappers\HTTP\Routing\Router as BaseBootstrapper;
use RDev\Routing\Router as HTTPRouter;
use RDev\Routing\Routes\Caching\ICache;

class Router extends BaseBootstrapper
{
    /**
     * Configures the router, which is useful for things like caching
     *
     * @param HTTPRouter $router The router to configure
     */
    protected function configureRouter(HTTPRouter $router)
    {
        $router->setMissedRouteController(Page::class);
        $routingConfig = require "{$this->paths["configs.http"]}/routing.php";
        $routesConfigPath = "{$this->paths["configs.http"]}/routes.php";

        if($routingConfig["cache"])
        {
            $cachedRoutesPath = "{$this->paths["routes.cache"]}/" . ICache::DEFAULT_CACHED_ROUTES_FILE_NAME;
            $routes = $this->cache->get($cachedRoutesPath, $router, $routesConfigPath);
            $router->setRouteCollection($routes);
        }
        else
        {
            require $routesConfigPath;
        }
    }
}