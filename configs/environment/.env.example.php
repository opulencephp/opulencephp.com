<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the application environment config
 */
use RDev\Applications\Environments\Environment;
use RDev\Sessions\Handlers\FileSessionHandler;

/** @var Environment $environment */
/**
 * ----------------------------------------------------------
 * Set SQL database connection info
 * ----------------------------------------------------------
 */
$environment->setVariable("DB_HOST", "localhost");
$environment->setVariable("DB_USER", "myuser");
$environment->setVariable("DB_PASSWORD", "mypassword");
$environment->setVariable("DB_NAME", "public");
$environment->setVariable("DB_PORT", 5432);

/**
 * ----------------------------------------------------------
 * Set the session driver
 * ----------------------------------------------------------
 */
$environment->setVariable("SESSION_HANDLER", FileSessionHandler::class);

/**
 * ----------------------------------------------------------
 * Set Redis connection info
 * ----------------------------------------------------------
 */
$environment->setVariable("REDIS_HOST", "localhost");
$environment->setVariable("REDIS_PASSWORD", null);
$environment->setVariable("REDIS_PORT", 6379);

/**
 * ----------------------------------------------------------
 * Set the encryption key
 * ----------------------------------------------------------
 */
$environment->setVariable("ENCRYPTION_KEY", "");