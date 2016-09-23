<?php
/**
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2016 David Young
 * @license   https://github.com/opulencephp/opulencephp.com/blob/master/LICENSE.md
 */
use Opulence\Cache\FileBridge;
use Opulence\Environments\Environment;
use Opulence\Sessions\Handlers\FileSessionHandler;

/**
 * ----------------------------------------------------------
 * Set environment metadata
 * ----------------------------------------------------------
 */
Environment::setVar("ENV_NAME", Environment::DEVELOPMENT);

/**
 * ----------------------------------------------------------
 * Set SQL database connection info
 * ----------------------------------------------------------
 */
Environment::setVar("DB_HOST", "localhost");
Environment::setVar("DB_USER", "myuser");
Environment::setVar("DB_PASSWORD", "mypassword");
Environment::setVar("DB_NAME", "public");
Environment::setVar("DB_PORT", 5432);

/**
 * ----------------------------------------------------------
 * Set the session handler and cache bridge
 * ----------------------------------------------------------
 */
Environment::setVar("SESSION_HANDLER", FileSessionHandler::class);
Environment::setVar("SESSION_CACHE_BRIDGE", FileBridge::class);
Environment::setVar("SESSION_COOKIE_DOMAIN", "");
Environment::setVar("SESSION_COOKIE_IS_SECURE", false);
Environment::setVar("SESSION_COOKIE_PATH", "/");

/**
 * ----------------------------------------------------------
 * Set Memcached connection info
 * ----------------------------------------------------------
 */
Environment::setVar("MEMCACHED_HOST", "localhost");
Environment::setVar("MEMCACHED_PORT", 11211);

/**
 * ----------------------------------------------------------
 * Set Redis connection info
 * ----------------------------------------------------------
 */
Environment::setVar("REDIS_HOST", "localhost");
Environment::setVar("REDIS_PORT", 6379);
Environment::setVar("REDIS_DATABASE", 0);

/**
 * ----------------------------------------------------------
 * Set the encryption key
 * ----------------------------------------------------------
 */
Environment::setVar("ENCRYPTION_KEY", "");