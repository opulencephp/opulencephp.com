<?php
/**
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2017 David Young
 * @license   https://github.com/opulencephp/opulencephp.com/blob/master/LICENSE.md
 */
namespace OpulenceWebsite\Application\Bootstrappers\Console\Commands;

use Opulence\Console\Commands\CommandCollection;
use Opulence\Framework\Configuration\Config;
use Opulence\Ioc\Bootstrappers\Bootstrapper;
use Opulence\Ioc\IContainer;

/**
 * Defines the command bootstrapper
 */
class CommandsBootstrapper extends Bootstrapper
{
    /**
     * Sets the console commands from this project
     *
     * @param CommandCollection $commandCollection The commands to add to
     * @param IContainer $container The dependency injection container
     */
    public function run(CommandCollection $commandCollection, IContainer $container) : void
    {
        $commandClasses = require Config::get("paths", "config.console") . "/commands.php";

        // Instantiate each command class
        foreach ($commandClasses as $commandClass) {
            $commandCollection->add($container->resolve($commandClass));
        }
    }
}