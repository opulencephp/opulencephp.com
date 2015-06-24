<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the list of global middleware to be run on all routes
 */
use RDevWebsite\HTTP\Middleware\CheckCSRFToken;
use RDevWebsite\HTTP\Middleware\Session;

return [
    /**
     * ----------------------------------------------------------
     * Middleware to be run on every route
     * ----------------------------------------------------------
     *
     * List any HTTP middleware you'd like here
     */
    Session::class,
    CheckCSRFToken::class
];