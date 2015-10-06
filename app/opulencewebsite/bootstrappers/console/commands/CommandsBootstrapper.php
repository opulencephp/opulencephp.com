<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the command bootstrapper
 */
namespace OpulenceWebsite\Bootstrappers\Console\Commands;

use Opulence\Applications\Bootstrappers\Bootstrapper;
use Opulence\Console\Commands\CommandCollection;
use Opulence\IoC\IContainer;

class CommandsBootstrapper extends Bootstrapper
{
    /**
     * Sets the console commands from this project
     *
     * @param CommandCollection $commands The commands to add to
     * @param IContainer $container The dependency injection container
     */
    public function run(CommandCollection $commands, IContainer $container)
    {
        $commandClasses = require $this->paths["configs"] . "/console/commands.php";

        // Instantiate each command class
        foreach ($commandClasses as $commandClass) {
            $commands->add($container->makeShared($commandClass));
        }
    }
}