<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the list of bootstrapper classes to load for a console application
 */
use OpulenceWebsite\Bootstrappers\Console\Commands\Commands as ProjectCommands;
use OpulenceWebsite\Bootstrappers\HTTP\Routing\Router;
use OpulenceWebsite\Bootstrappers\HTTP\Views\View;
use Opulence\Framework\Bootstrappers\Console\Commands\Commands as OpulenceCommands;
use Opulence\Framework\Bootstrappers\Console\Requests\Requests;
use Opulence\Framework\Bootstrappers\Console\Composer\Composer;

return [
    Router::class,
    OpulenceCommands::class,
    Requests::class,
    Composer::class,
    View::class,
    ProjectCommands::class
];