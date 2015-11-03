<?php
/**
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2015 David Young
 * @license   https://github.com/opulencephp/Opulence/blob/master/LICENSE.md
 */
namespace OpulenceWebsite\Http\Middleware;

use Closure;
use OpulenceWebsite\Docs\Documentation;
use Opulence\Http\Middleware\IMiddleware;
use Opulence\Http\Requests\Request;
use Opulence\Http\Responses\RedirectResponse;
use Opulence\Routing\Router;
use Opulence\Routing\Url\UrlGenerator;

/**
 * Defines the documentation middleware
 */
class  Docs implements IMiddleware
{
    /** @var Router The Http router */
    private $router = null;
    /** @var UrlGenerator The URL generator */
    private $urlGenerator = null;
    /** @var Documentation The docs */
    private $docs = null;

    /**
     * @param Router $router The Http router
     * @param Documentation $docs The docs
     * @param UrlGenerator $urlGenerator The URL generator
     */
    public function __construct(Router $router, Documentation $docs, UrlGenerator $urlGenerator)
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
        $version = $matchedRoute->getPathVar("version");
        $docName = $matchedRoute->getPathVar("docName");

        if (!$this->docs->hasVersion($version)) {
            return new RedirectResponse("/docs");
        }

        if (!$this->docs->hasDoc($version, $docName)) {
            return new RedirectResponse(
                $this->urlGenerator->createFromName("docs", $version, $this->docs->getDefaultDoc($version))
            );
        }

        return $next($request);
    }
}