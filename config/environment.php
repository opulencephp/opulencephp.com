<?php
/**
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2016 David Young
 * @license   https://github.com/opulencephp/opulencephp.com/blob/master/LICENSE.md
 */
/**
 * ----------------------------------------------------------
 * Load environment config files
 * ----------------------------------------------------------
 *
 * Note:  For performance in production, it's highly suggested
 * you set environment variables on the server itself
 */
$environmentConfigFiles = [
    __DIR__ . "/environment/.env.app.php"
];

foreach ($environmentConfigFiles as $environmentConfigFile) {
    require $environmentConfigFile;
}