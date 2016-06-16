<?php
/**
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2016 David Young
 * @license   https://github.com/opulencephp/opulencephp.com/blob/master/LICENSE.md
 */
namespace OpulenceWebsite\Application\Console;

use Opulence\Bootstrappers\ApplicationBinder;
use Opulence\Framework\Console\Testing\PhpUnit\IntegrationTestCase as BaseIntegrationTestCase;
use Opulence\Ioc\IContainer;

/**
 * Defines the console integration test
 */
class IntegrationTestCase extends BaseIntegrationTestCase
{
    /**
     * @inheritdoc
     */
    public function setUp()
    {
        $paths = require __DIR__ . "/../../../../../config/paths.php";
        $this->environment = require __DIR__ . "/../../../../../config/environment.php";
        $this->application = require __DIR__ . "/../../../../../config/application.php";
        /** @var IContainer $container */
        $this->container = $container;

        /**
         * ----------------------------------------------------------
         * Finish configuring the bootstrappers for the console kernel
         * ----------------------------------------------------------
         *
         * @var ApplicationBinder $applicationBinder
         */
        $applicationBinder->bindToApplication(
            require __DIR__ . "/../../../../../config/console/bootstrappers.php",
            false,
            false
        );

        parent::setUp();
    }
}