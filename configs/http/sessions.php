<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the session config
 */
/**
 * ----------------------------------------------------------
 * Defines session properties
 * ----------------------------------------------------------
 */
return [
    /**
     * ----------------------------------------------------------
     * General settings
     * ----------------------------------------------------------
     *
     * "lifetime" => Lifetime of the session in seconds
     * "name" => The name of the session
     */
    "lifetime" => 7200,
    "name" => "__rdev_session",
    /**
     * ----------------------------------------------------------
     * Garbage collection settings
     * ----------------------------------------------------------
     *
     * "gc.chance" => The chance that garbage collection will be run
     * "gc.divisor" => The divisor to calculate the probability (default is 1 in 100 chance)
     */
    "gc.chance" => 1,
    "gc.divisor" => 100,
    /**
     * ----------------------------------------------------------
     * Settings for the session Id cookie
     * ----------------------------------------------------------
     *
     * These are useful if you use a cookie to remember the session Id between requests
     *
     * "cookie.domain" => The domain of the cookie
     * "cookie.isSecure" => Whether or not the cookie is secure
     * "cookie.path" => The path of the cookie
     */
    "cookie.domain" => "",
    "cookie.isSecure" => false,
    "cookie.path" => "/",
    /**
     * ----------------------------------------------------------
     * File-backed session settings
     * ----------------------------------------------------------
     *
     * "file.path" => The path of the session file
     */
    "file.path" => "/tmp"
];