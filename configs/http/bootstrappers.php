<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the list of bootstrapper classes to load for an HTTP application
 */
use RDevWebsite\Bootstrappers\HTTP\Routing\Router;
use RDevWebsite\Bootstrappers\HTTP\Sessions\Session;
use RDevWebsite\Bootstrappers\HTTP\Views\Builders;
use RDevWebsite\Bootstrappers\HTTP\Views\Template;
use RDevWebsite\Bootstrappers\HTTP\Views\TemplateFunctions;
use RDev\Framework\Bootstrappers\HTTP\Requests\Request;

return [
    Request::class,
    Router::class,
    Session::class,
    Template::class,
    Builders::class,
    TemplateFunctions::class
];