<?php

/*
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2017 David Young
 * @license   https://github.com/opulencephp/Opulence/blob/master/LICENSE.md
 */

use Opulence\Framework\Composer\Bootstrappers\ComposerBootstrapper;
use Opulence\Framework\Console\Bootstrappers\CommandsBootstrapper as OpulenceCommandsBootstrapper;
use Opulence\Framework\Console\Bootstrappers\RequestBootstrapper;
use Opulence\Framework\Databases\Bootstrappers\MigrationBootstrapper;
use OpulenceWebsite\Application\Bootstrappers\Console\Commands\CommandsBootstrapper as WebsiteCommandsBootstrapper;
use OpulenceWebsite\Application\Bootstrappers\Databases\SqlBootstrapper;
use OpulenceWebsite\Application\Bootstrappers\Http\Routing\RouterBootstrapper;
use OpulenceWebsite\Application\Bootstrappers\Http\Views\ViewBootstrapper;

/**
 * ----------------------------------------------------------
 * Define bootstrapper classes for a console application
 * ----------------------------------------------------------
 */
return [
    RouterBootstrapper::class,
    OpulenceCommandsBootstrapper::class,
    RequestBootstrapper::class,
    ComposerBootstrapper::class,
    ViewBootstrapper::class,
    WebsiteCommandsBootstrapper::class,
    SqlBootstrapper::class,
    MigrationBootstrapper::class
];
