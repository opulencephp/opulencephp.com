<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the list of bootstrapper classes to load for a console application
 */
use RDevWebsite\Bootstrappers\Console\Commands\Commands as ProjectCommands;
use RDevWebsite\Bootstrappers\HTTP\Routing\Router;
use RDevWebsite\Bootstrappers\HTTP\Views\Template;
use RDev\Framework\Bootstrappers\Console\Commands\Commands as RDevCommands;
use RDev\Framework\Bootstrappers\Console\Requests\Requests;
use RDev\Framework\Bootstrappers\Console\Composer\Composer;

return [
    Router::class,
    RDevCommands::class,
    Requests::class,
    Composer::class,
    Template::class,
    ProjectCommands::class
];