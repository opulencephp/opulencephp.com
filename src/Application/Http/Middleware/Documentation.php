<?php

/*
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2021 David Young
 * @license   https://github.com/opulencephp/Opulence/blob/master/LICENSE.md
 */

namespace Project\Application\Http\Middleware;

use Closure;
use Opulence\Http\Requests\Request;
use Opulence\Http\Responses\RedirectResponse;
use Opulence\Http\Responses\Response;
use Opulence\Routing\Middleware\IMiddleware;
use Opulence\Routing\Router;
use Opulence\Routing\Urls\UrlGenerator;
use Project\Application\Config\DocumentationConfig;

/**
 * Defines the documentation middleware
 */
class Documentation implements IMiddleware
{
    /** @var Router The Http router */
    private $router = null;
    /** @var UrlGenerator The URL generator */
    private $urlGenerator = null;
    /** @var DocumentationConfig The documentationConfig */
    private $documentationConfig = null;

    /**
     * @param Router $router The Http router
     * @param DocumentationConfig $documentationConfig The documentationConfig
     * @param UrlGenerator $urlGenerator The URL generator
     */
    public function __construct(Router $router, DocumentationConfig $documentationConfig, UrlGenerator $urlGenerator)
    {
        $this->router = $router;
        $this->documentationConfig = $documentationConfig;
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * @inheritdoc
     */
    public function handle(Request $request, Closure $next) : Response
    {
        $matchedRoute = $this->router->getMatchedRoute();
        $version = $matchedRoute->getPathVar('version');
        $docName = $matchedRoute->getPathVar('docName');

        if (!$this->documentationConfig->hasVersion($version)) {
            return new RedirectResponse('/docs');
        }

        if (!$this->documentationConfig->hasDoc($version, $docName)) {
            return new RedirectResponse(
                $this->urlGenerator->createFromName('docs', $version,
                    $this->documentationConfig->getDefaultDoc($version))
            );
        }

        return $next($request);
    }
}
