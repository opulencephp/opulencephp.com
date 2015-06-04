<?php
/**
 * Defines the HTTP application test case
 */
namespace RDevWebsite\HTTP;
use Closure;
use RDev\Applications\Application;
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
        require __DIR__ . "/../../../../bootstrap/start.php";
        $this->application = $application;

        /**
         * ----------------------------------------------------------
         * Setup the bootstrappers
         * ----------------------------------------------------------
         *
         * @var Closure $configureBootstrappers
         */
        $configureBootstrappers = require __DIR__ . "/../../../../bootstrap/configureBootstrappers.php";
        $configureBootstrappers(
            $this->application,
            require $application->getPaths()["configs"] . "/http/bootstrappers.php",
            false,
            false
        );
    }
}