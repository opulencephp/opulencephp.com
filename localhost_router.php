<?php

/*
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2017 David Young
 * @license   https://github.com/opulencephp/Opulence/blob/master/LICENSE.md
 */

/**
 * ----------------------------------------------------------
 * Acts as a router when running in localhost
 * ----------------------------------------------------------
 */
$requestUri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

if ($requestUri != '/' && file_exists(__DIR__ . "/public$requestUri")) {
    return false;
}

require_once __DIR__ . '/public/index.php';
