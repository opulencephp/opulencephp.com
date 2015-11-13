<?php
/**
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2015 David Young
 * @license   https://github.com/opulencephp/Opulence/blob/master/LICENSE.md
 */
namespace OpulenceWebsite\Http\Controllers;

use OpulenceWebsite\Docs\Documentation;
use Opulence\Http\Responses\RedirectResponse;
use Opulence\Http\Responses\Response;
use Opulence\Routing\Controller;
use Opulence\Routing\Url\UrlGenerator;

/**
 * Defines the documentation page controller
 */
class  Docs extends Controller
{
    /** @var Documentation The object used to grab documents */
    protected $docs = null;
    /** @var UrlGenerator The URL generator */
    protected $urlGenerator = null;

    /**
     * @param Documentation $docs The object used to grab documents
     * @param UrlGenerator $urlGenerator The URL generator
     */
    public function __construct(Documentation $docs, UrlGenerator $urlGenerator)
    {
        $this->docs = $docs;
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * Shows a page with documentation
     *
     * @param string $docName The name of the document to retrieve
     * @param string $version The Opulence version to retrieve
     * @return Response The page
     */
    public function showDoc($docName, $version = Documentation::DEFAULT_BRANCH)
    {
        $docs = $this->docs->getFlattenedDocs($version);
        $this->view = $this->viewFactory->create("Docs");
        $this->view->setVar("version", $version);
        $this->view->setVar("doc", $this->docs->getCompiledDoc($docName, $version));
        $this->view->setVar("docs", $this->docs->getDocs($version));
        $this->view->setVar("title", $docs[$docName]["title"]);
        $this->view->setVar("docName", $docName);
        $this->view->setVar("docVersion", $version);
        $this->view->setVar("metaKeywords", $docs[$docName]["keywords"]);
        $this->view->setVar("metaDescription", $docs[$docName]["description"]);

        return new Response($this->viewCompiler->compile($this->view));
    }

    /**
     * Shows the index doc page
     *
     * @param string $version The Opulence version to retrieve
     * @return Response The index page
     */
    public function showIndex($version = Documentation::DEFAULT_BRANCH)
    {
        return $this->showDoc($this->docs->getDefaultDoc($version), $version);
    }

    /**
     * Redirects a user that tried to access docs without specifying a version number
     *
     * @param string $docName The name of the document to retrieve
     * @return RedirectResponse The redirect
     */
    public function showNoVersionDoc($docName)
    {
        return new RedirectResponse(
            $this->urlGenerator->createFromName("docs", Documentation::DEFAULT_BRANCH, $docName)
        );
    }
}