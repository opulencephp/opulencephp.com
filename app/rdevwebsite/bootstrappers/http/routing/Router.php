<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines the router bootstrapper
 */
namespace RDevWebsite\Bootstrappers\HTTP\Routing;
use RDev\Applications\Bootstrappers\Bootstrapper;
use RDev\Routing\Router as HTTPRouter;
use RDevWebsite\HTTP\Controllers\Page;

class Router extends Bootstrapper
{
    /**
     * Sets the missed route controller
     *
     * @param HTTPRouter $router The router to set the missed route controller on
     */
    public function run(HTTPRouter $router)
    {
        $router->setMissedRouteController(Page::class);
        require $this->paths["configs"] . "/http/routing.php";
    }
}