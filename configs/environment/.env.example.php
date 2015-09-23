<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the application environment config
 */
use Opulence\Applications\Environments\Environment;
use Opulence\Cache\FileBridge;
use Opulence\Sessions\Handlers\FileSessionHandler;

/** @var Environment $environment */
/**
 * ----------------------------------------------------------
 * Set SQL database connection info
 * ----------------------------------------------------------
 */
$environment->setVar("DB_HOST", "localhost");
$environment->setVar("DB_USER", "myuser");
$environment->setVar("DB_PASSWORD", "mypassword");
$environment->setVar("DB_NAME", "public");
$environment->setVar("DB_PORT", 5432);

/**
 * ----------------------------------------------------------
 * Set the session handler and cache bridge
 * ----------------------------------------------------------
 */
$environment->setVar("SESSION_HANDLER", FileSessionHandler::class);
$environment->setVar("SESSION_CACHE_BRIDGE", FileBridge::class);

/**
 * ----------------------------------------------------------
 * Set Memcached connection info
 * ----------------------------------------------------------
 */
$environment->setVar("MEMCACHED_HOST", "localhost");
$environment->setVar("MEMCACHED_PORT", 11211);

/**
 * ----------------------------------------------------------
 * Set Redis connection info
 * ----------------------------------------------------------
 */
$environment->setVar("REDIS_HOST", "localhost");
$environment->setVar("REDIS_PASSWORD", null);
$environment->setVar("REDIS_PORT", 6379);

/**
 * ----------------------------------------------------------
 * Set the encryption key
 * ----------------------------------------------------------
 */
$environment->setVar("ENCRYPTION_KEY", "");