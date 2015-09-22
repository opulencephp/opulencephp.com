<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines the documentation middleware
 */
namespace OpulenceWebsite\HTTP\Middleware;
use Closure;
use OpulenceWebsite\Docs\Documentation;
use Opulence\HTTP\Middleware\IMiddleware;
use Opulence\HTTP\Requests\Request;
use Opulence\HTTP\Responses\RedirectResponse;
use Opulence\Routing\Router;
use Opulence\Routing\URL\URLGenerator;

class Docs implements IMiddleware
{
    /** @var Router The HTTP router */
    private $router = null;
    /** @var URLGenerator The URL generator */
    private $urlGenerator = null;
    /** @var Documentation The docs */
    private $docs = null;

    /**
     * @param Router $router The HTTP router
     * @param Documentation $docs The docs
     * @param URLGenerator $urlGenerator The URL generator
     */
    public function __construct(Router $router, Documentation $docs, URLGenerator $urlGenerator)
    {
        $this->router = $router;
        $this->docs = $docs;
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * @inheritdoc
     */
    public function handle(Request $request, Closure $next)
    {
        $matchedRoute = $this->router->getMatchedRoute();
        $version = $matchedRoute->getPathVariable("version");
        $docName = $matchedRoute->getPathVariable("docName");

        if(!$this->docs->hasVersion($version))
        {
            return new RedirectResponse("/docs");
        }

        if(!$this->docs->hasDoc($version, $docName))
        {
            return new RedirectResponse(
                $this->urlGenerator->createFromName("docs", [$version, $this->docs->getDefaultDoc($version)])
            );
        }

        return $next($request);
    }
}