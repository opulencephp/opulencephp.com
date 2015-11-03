<?php
/**
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2015 David Young
 * @license   https://github.com/opulencephp/Opulence/blob/master/LICENSE.md
 */
/**
 * ----------------------------------------------------------
 * Define the PHPUnit config
 * ----------------------------------------------------------
 */
$paths = require __DIR__ . "/paths.php";
require_once $paths["vendor"] . "/autoload.php";

// Set the default timezone in case the test server doesn't have it already set
date_default_timezone_set("UTC");