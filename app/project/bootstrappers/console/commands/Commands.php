<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the command bootstrapper
 */
namespace Project\Bootstrappers\Console\Commands;
use RDev\Applications\Bootstrappers\Bootstrapper;
use RDev\Console\Commands\Commands as ConsoleCommands;
use RDev\IoC\IContainer;

class Commands extends Bootstrapper
{
    /**
     * Sets the console commands from this project
     *
     * @param ConsoleCommands $commands The commands to add to
     * @param IContainer $container The dependency injection container
     */
    public function run(ConsoleCommands $commands, IContainer $container)
    {
        $commandClasses = require $this->paths["configs"] . "/console/commands.php";

        // Instantiate each command class
        foreach($commandClasses as $commandClass)
        {
            $commands->add($container->makeShared($commandClass));
        }
    }
}