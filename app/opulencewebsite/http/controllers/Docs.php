<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines the documentation page controller
 */
namespace OpulenceWebsite\HTTP\Controllers;

use OpulenceWebsite\Docs\Documentation;
use Opulence\HTTP\Responses\RedirectResponse;
use Opulence\HTTP\Responses\Response;
use Opulence\Routing\Controller;
use Opulence\Routing\URL\URLGenerator;

class Docs extends Controller
{
    /** @var Documentation The object used to grab documents */
    protected $docs = null;
    /** @var URLGenerator The URL generator */
    protected $urlGenerator = null;

    /**
     * @param Documentation $docs The object used to grab documents
     * @param URLGenerator $urlGenerator The URL generator
     */
    public function __construct(Documentation $docs, URLGenerator $urlGenerator)
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
            $this->urlGenerator->createFromName("docs", [Documentation::DEFAULT_BRANCH, $docName])
        );
    }
}