<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the HTTP application test case
 */
namespace RDevWebsite\HTTP;
use RDev\Applications\Application;
use RDev\Applications\Bootstrappers\Dispatchers\IDispatcher;
use RDev\Applications\Bootstrappers\IO\BootstrapperIO;
use RDev\Framework\Tests\HTTP\ApplicationTestCase as BaseTestCase;

class ApplicationTestCase extends BaseTestCase
{
    /**
     * {@inheritdoc}
     */
    protected function getGlobalMiddleware()
    {
        require __DIR__ . "/../../../../configs/http/middleware.php";
    }

    /**
     * {@inheritdoc}
     */
    protected function setApplication()
    {
        /** @var Application $application */
        /** @var BootstrapperIO $bootstrapperIO */
        /** @var IDispatcher $bootstrapperDispatcher */
        require __DIR__ . "/../../../../bootstrap/start.php";
        $httpBootstrapperClasses = require $application->getPaths()["configs"] . "/http/bootstrappers.php";
        $bootstrapperIO->registerBootstrapperClasses($httpBootstrapperClasses);
        $application->registerPreStartTask(function() use ($bootstrapperDispatcher, &$bootstrapperIO)
        {
            $bootstrapperDispatcher->dispatch(
                $bootstrapperIO->read(BootstrapperIO::CACHED_HTTP_BOOTSTRAPPER_REGISTRY_FILE_NAME)
            );
        });
        $this->application = $application;
    }
}