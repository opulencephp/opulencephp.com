<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines the documentation middleware
 */
namespace Project\HTTP\Middleware;
use Closure;
use Project\Docs\Documentation;
use RDev\HTTP\Middleware\IMiddleware;
use RDev\HTTP\Requests\Request;
use RDev\HTTP\Responses\RedirectResponse;
use RDev\HTTP\Routing\Router;
use RDev\HTTP\Routing\URL\URLGenerator;

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
     * {@inheritdoc}
     */
    public function handle(Request $request, Closure $next)
    {
        $matchedRoute = $this->router->getMatchedRoute();
        $pathVariables = $matchedRoute->getPathVariables();
        $version = $pathVariables["version"];
        $docName = $pathVariables["docName"];

        if(!$this->docs->hasVersion($version))
        {
            return new RedirectResponse("/docs");
        }

        $docs = $this->docs->getFlattenedDocs($version);

        if(!isset($docs[$docName]))
        {
            return new RedirectResponse(
                $this->urlGenerator->createFromName("docs", [$version, $this->docs->getDefaultDoc($version)])
            );
        }

        return $next($request);
    }
}