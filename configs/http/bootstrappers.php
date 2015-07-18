<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the list of bootstrapper classes to load for an HTTP application
 */
use OpulenceWebsite\Bootstrappers\HTTP\Routing\Router;
use OpulenceWebsite\Bootstrappers\HTTP\Sessions\Session;
use OpulenceWebsite\Bootstrappers\HTTP\Views\Builders;
use OpulenceWebsite\Bootstrappers\HTTP\Views\Template;
use OpulenceWebsite\Bootstrappers\HTTP\Views\TemplateFunctions;
use Opulence\Framework\Bootstrappers\HTTP\Requests\Request;

return [
    Request::class,
    Router::class,
    Session::class,
    Template::class,
    Builders::class,
    TemplateFunctions::class
];