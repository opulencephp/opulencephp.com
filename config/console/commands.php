<?php
/**
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2016 David Young
 * @license   https://github.com/opulencephp/opulencephp.com/blob/master/LICENSE.md
 */
use OpulenceWebsite\Application\Console\Commands\Documentation\CompileApiCommand;
use OpulenceWebsite\Application\Console\Commands\Documentation\CompileDocumentationCommand;

/**
 * ----------------------------------------------------------
 * Define the console command classes to load
 * ----------------------------------------------------------
 */
return [
    CompileApiCommand::class,
    CompileDocumentationCommand::class
];