<?php
/**
 * Defines the HTTP application test case
 */
namespace RDevWebsite\HTTP;
use RDev\Applications\Application;
use RDev\Applications\Bootstrappers\ApplicationBinder;
use RDev\Framework\Tests\HTTP\ApplicationTestCase as BaseTestCase;

class ApplicationTestCase extends BaseTestCase
{
    /**
     * {@inheritdoc}
     */
    protected function getGlobalMiddleware()
    {
        return require __DIR__ . "/../../../../configs/http/middleware.php";
    }

    /**
     * {@inheritdoc}
     */
    protected function getKernelLogger()
    {
        return require __DIR__ . "/../../../../configs/http/logging.php";
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
         * Finish configuring the bootstrappers for the HTTP kernel
         * ----------------------------------------------------------
         *
         * @var ApplicationBinder $applicationBinder
         */
        $applicationBinder->bindToApplication(
            require __DIR__ . "/../../../../configs/http/bootstrappers.php",
            false,
            false
        );
    }
}