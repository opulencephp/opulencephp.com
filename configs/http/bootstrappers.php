<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the list of bootstrapper classes to load for an HTTP application
 */
use OpulenceWebsite\Bootstrappers\HTTP\Routing\Router;
use OpulenceWebsite\Bootstrappers\HTTP\Sessions\Session;
use OpulenceWebsite\Bootstrappers\HTTP\Views\Builders;
use OpulenceWebsite\Bootstrappers\HTTP\Views\View;
use OpulenceWebsite\Bootstrappers\HTTP\Views\ViewFunctions;
use Opulence\Framework\Bootstrappers\HTTP\Requests\Request;

return [
    Request::class,
    Router::class,
    Session::class,
    View::class,
    Builders::class,
    ViewFunctions::class
];