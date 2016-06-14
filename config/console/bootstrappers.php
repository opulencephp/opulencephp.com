<?php
/**
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2016 David Young
 * @license   https://github.com/opulencephp/opulencephp.com/blob/master/LICENSE.md
 */
use Opulence\Framework\Bootstrappers\Console\Commands\CommandsBootstrapper as OpulenceCommandsBootstrapper;
use Opulence\Framework\Bootstrappers\Console\Requests\RequestsBootstrapper;
use Opulence\Framework\Bootstrappers\Console\Composer\ComposerBootstrapper;
use OpulenceWebsite\Application\Bootstrappers\Console\Commands\CommandsBootstrapper as WebsiteCommandsBootstrapper;
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
    RequestsBootstrapper::class,
    ComposerBootstrapper::class,
    ViewBootstrapper::class,
    WebsiteCommandsBootstrapper::class
];