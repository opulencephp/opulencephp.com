<?php
/**
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2015 David Young
 * @license   https://github.com/opulencephp/Opulence/blob/master/LICENSE.md
 */
use OpulenceWebsite\Bootstrappers\Console\Commands\CommandsBootstrapper as WebsiteCommandsBootstrapper;
use OpulenceWebsite\Bootstrappers\Http\Routing\RouterBootstrapper;
use OpulenceWebsite\Bootstrappers\Http\Views\ViewBootstrapper;
use Opulence\Framework\Bootstrappers\Console\Commands\CommandsBootstrapper as OpulenceCommandsBootstrapper;
use Opulence\Framework\Bootstrappers\Console\Requests\RequestsBootstrapper;
use Opulence\Framework\Bootstrappers\Console\Composer\ComposerBootstrapper;

/**
 * ----------------------------------------------------------
 * Define bootstrapper classes for a console application
 * ----------------------------------------------------------
 */
return [
    RouterBootstrapper::class,
    OpulenceCommandsBootstrapper::class,
    RequestsBootstrapper::class,
    ComposerBootstrapper::class,
    ViewBootstrapper::class,
    WebsiteCommandsBootstrapper::class
];