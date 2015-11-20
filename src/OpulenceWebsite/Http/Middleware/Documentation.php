<?php
/**
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2015 David Young
 * @license   https://github.com/opulencephp/opulencephp.com/blob/master/LICENSE.md
 */
namespace OpulenceWebsite\Http\Middleware;

use Closure;
use Opulence\Http\Middleware\IMiddleware;
use Opulence\Http\Requests\Request;
use Opulence\Http\Responses\RedirectResponse;
use Opulence\Routing\Router;
use Opulence\Routing\Url\UrlGenerator;
use OpulenceWebsite\Documentation\Documentation as DocumentationWrapper;

/**
 * Defines the documentation middleware
 */
class Documentation implements IMiddleware
{
    /** @var Router The Http router */
    private $router = null;
    /** @var UrlGenerator The URL generator */
    private $urlGenerator = null;
    /** @var DocumentationWrapper The docs */
    private $docs = null;

    /**
     * @param Router $router The Http router
     * @param DocumentationWrapper $docs The docs
     * @param UrlGenerator $urlGenerator The URL generator
     */
    public function __construct(Router $router, DocumentationWrapper $docs, UrlGenerator $urlGenerator)
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