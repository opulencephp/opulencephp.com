<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the list of bootstrapper classes to load for an HTTP application
 */
use OpulenceWebsite\Bootstrappers\HTTP\Routing\RouterBootstrapper;
use OpulenceWebsite\Bootstrappers\HTTP\Sessions\SessionBootstrapper;
use OpulenceWebsite\Bootstrappers\HTTP\Views\BuildersBootstrapper;
use OpulenceWebsite\Bootstrappers\HTTP\Views\ViewBootstrapper;
use OpulenceWebsite\Bootstrappers\HTTP\Views\ViewFunctionsBootstrapper;
use Opulence\Framework\Bootstrappers\HTTP\Requests\RequestBootstrapper;

return [
    RequestBootstrapper::class,
    RouterBootstrapper::class,
    SessionBootstrapper::class,
    ViewBootstrapper::class,
    BuildersBootstrapper::class,
    ViewFunctionsBootstrapper::class
];