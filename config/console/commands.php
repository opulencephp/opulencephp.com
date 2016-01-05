<?php
/**
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2016 David Young
 * @license   https://github.com/opulencephp/opulencephp.com/blob/master/LICENSE.md
 */
use OpulenceWebsite\Console\Commands\ApiCommand;
use OpulenceWebsite\Console\Commands\DocsCommand;

/**
 * ----------------------------------------------------------
 * Define the console command classes to load
 * ----------------------------------------------------------
 */
return [
    ApiCommand::class,
    DocsCommand::class
];