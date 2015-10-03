<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the view bootstrapper
 */
namespace OpulenceWebsite\Bootstrappers\HTTP\Views;

use Opulence\Files\FileSystem;
use Opulence\Framework\Bootstrappers\HTTP\Views\ViewBootstrapper as BaseBootstrapper;
use Opulence\IoC\IContainer;
use Opulence\Views\Caching\Cache;
use Opulence\Views\Caching\ICache;

class ViewBootstrapper extends BaseBootstrapper
{
    /**
     * Gets the view cache
     * To use a different view cache than the one returned here, extend this class and override this method
     *
     * @param IContainer $container The dependency injection container
     * @return ICache The view cache
     */
    protected function getViewCache(IContainer $container)
    {
        $fileSystem = $container->makeShared(FileSystem::class);
        $cacheConfig = require_once $this->paths["configs"] . "/http/views.php";

        return new Cache(
            $fileSystem,
            $this->paths["views.compiled"],
            $cacheConfig["cache.lifetime"],
            $cacheConfig["gc.chance"],
            $cacheConfig["gc.divisor"]
        );
    }

}