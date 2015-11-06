<?php
/**
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2015 David Young
 * @license   https://github.com/opulencephp/Opulence/blob/master/LICENSE.md
 */
namespace OpulenceWebsite\Http;

use Opulence\Applications\Application;
use Opulence\Applications\Bootstrappers\ApplicationBinder;
use Opulence\Framework\Testing\PhpUnit\Http\ApplicationTestCase as BaseTestCase;
use Opulence\Ioc\IContainer;

/**
 * Defines the Http application test case
 */
class  ApplicationTestCase extends BaseTestCase
{
    /**
     * @inheritdoc
     */
    protected function getGlobalMiddleware()
    {
        return require __DIR__ . "/../../../../configs/http/middleware.php";
    }

    /**
     * @inheritdoc
     */
    protected function getKernelLogger()
    {
        return require __DIR__ . "/../../../../configs/http/logging.php";
    }

    /**
     * @inheritdoc
     */
    protected function setApplicationAndIocContainer()
    {
        /** @var Application $application */
        require __DIR__ . "/../../../../bootstrap/start.php";
        $this->application = $application;
        /** @var IContainer $container */
        $this->container = $container;

        /**
         * ----------------------------------------------------------
         * Finish configuring the bootstrappers for the Http kernel
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