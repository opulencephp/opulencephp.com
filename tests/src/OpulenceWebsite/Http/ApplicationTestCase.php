<?php
/**
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2015 David Young
 * @license   https://github.com/opulencephp/opulencephp.com/blob/master/LICENSE.md
 */
namespace OpulenceWebsite\Http;

use Opulence\Bootstrappers\ApplicationBinder;
use Opulence\Debug\Errors\Handlers\IErrorHandler;
use Opulence\Debug\Exceptions\Handlers\IExceptionHandler;
use Opulence\Framework\Debug\Exceptions\Handlers\Http\IExceptionRenderer;
use Opulence\Framework\Testing\PhpUnit\Http\ApplicationTestCase as BaseTestCase;
use Opulence\Ioc\IContainer;

/**
 * Defines the HTTP application test case
 */
class ApplicationTestCase extends BaseTestCase
{
    /** @var IExceptionHandler The exception handler used by HTTP applications */
    private $exceptionHandler = null;
    /** @var IExceptionRenderer The exception renderer used by HTTP applications */
    private $exceptionRenderer = null;

    /**
     * @inheritdoc
     */
    public function setUp()
    {
        $paths = require __DIR__ . "/../../../../config/paths.php";
        $environment = require __DIR__ . "/../../../../config/environment.php";
        /** @var IExceptionRenderer $exceptionRenderer */
        /** @var IExceptionHandler $exceptionHandler */
        /** @var IErrorHandler $errorHandler */
        $exceptionHandler = require __DIR__ . "/../../../../config/http/exceptions.php";
        $errorHandler = require __DIR__ . "/../../../../config/http/errors.php";
        $exceptionHandler->register();
        $errorHandler->register();
        $this->exceptionHandler = $exceptionHandler;
        $this->exceptionRenderer = $exceptionRenderer;
        $this->application = require __DIR__ . "/../../../../config/application.php";
        /** @var IContainer $container */
        $this->container = $container;

        /**
         * ----------------------------------------------------------
         * Finish configuring the bootstrappers for the HTTP kernel
         * ----------------------------------------------------------
         *
         * @var ApplicationBinder $applicationBinder
         */
        $applicationBinder->bindToApplication(
            require __DIR__ . "/../../../../config/http/bootstrappers.php",
            false,
            false
        );

        parent::setUp();
    }

    /**
     * @inheritdoc
     */
    protected function getExceptionHandler()
    {
        return $this->exceptionHandler;
    }

    /**
     * @inheritdoc
     */
    protected function getExceptionRenderer()
    {
        return $this->exceptionRenderer;
    }

    /**
     * @inheritdoc
     */
    protected function getGlobalMiddleware()
    {
        return require __DIR__ . "/../../../../config/http/middleware.php";
    }
}