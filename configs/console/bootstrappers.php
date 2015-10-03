<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the list of bootstrapper classes to load for a console application
 */
use OpulenceWebsite\Bootstrappers\Console\Commands\CommandsBootstrapper as WebsiteCommandsBootstrapper;
use OpulenceWebsite\Bootstrappers\HTTP\Routing\RouterBootstrapper;
use OpulenceWebsite\Bootstrappers\HTTP\Views\ViewBootstrapper;
use Opulence\Framework\Bootstrappers\Console\Commands\CommandsBootstrapper as OpulenceCommandsBootstrapper;
use Opulence\Framework\Bootstrappers\Console\Requests\RequestsBootstrapper;
use Opulence\Framework\Bootstrappers\Console\Composer\ComposerBootstrapper;

return [
    RouterBootstrapper::class,
    OpulenceCommandsBootstrapper::class,
    RequestsBootstrapper::class,
    ComposerBootstrapper::class,
    ViewBootstrapper::class,
    WebsiteCommandsBootstrapper::class
];