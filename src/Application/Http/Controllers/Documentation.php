<?php

/*
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2021 David Young
 * @license   https://github.com/opulencephp/Opulence/blob/master/LICENSE.md
 */

namespace Project\Application\Http\Controllers;

use Opulence\Http\Responses\RedirectResponse;
use Opulence\Http\Responses\Response;
use Opulence\Routing\Controller;
use Opulence\Routing\Urls\UrlGenerator;
use Project\Application\Config\DocumentationConfig;
use Project\Domain\Documentation\Factories\IDocumentationFactory;

/**
 * Defines the documentation page controller
 */
class Documentation extends Controller
{
    /** @var DocumentationConfig The documentation config wrapper */
    protected $documentationConfig = null;
    /** @var IDocumentationFactory The documentation factory */
    private $documentationFactory = null;
    /** @var UrlGenerator The URL generator */
    protected $urlGenerator = null;

    /**
     * @param DocumentationConfig $documentationConfig The documentation config
     * @param IDocumentationFactory $documentationFactory The documentation factory
     * @param UrlGenerator $urlGenerator The URL generator
     */
    public function __construct(
        DocumentationConfig $documentationConfig,
        IDocumentationFactory $documentationFactory,
        UrlGenerator $urlGenerator
    ) {
        $this->documentationConfig = $documentationConfig;
        $this->documentationFactory = $documentationFactory;
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * Shows a page with documentation
     *
     * @param string $docName The name of the document to retrieve
     * @param string $version The Opulence version to retrieve
     * @return Response The page
     */
    public function showDoc(string $docName, string $version = DocumentationConfig::DEFAULT_BRANCH) : Response
    {
        $docs = $this->documentationConfig->getFlattenedDocs($version);
        $this->view = $this->viewFactory->createView('Docs');
        $this->view->setVar('version', $version);
        $this->view->setVar('doc', $this->documentationFactory->createDocument($docName, $version));
        $this->view->setVar('docs', $this->documentationConfig->getDocs($version));
        $this->view->setVar('title', $docs[$docName]['title']);
        $this->view->setVar('docName', $docName);
        $this->view->setVar('docVersion', $version);
        $this->view->setVar('metaKeywords', $docs[$docName]['keywords']);
        $this->view->setVar('metaDescription', $docs[$docName]['description']);

        return new Response($this->viewCompiler->compile($this->view));
    }

    /**
     * Shows the index doc page
     *
     * @param string $version The Opulence version to retrieve
     * @return Response The index page
     */
    public function showIndex(string $version = DocumentationConfig::DEFAULT_BRANCH) : Response
    {
        return $this->showDoc($this->documentationConfig->getDefaultDoc($version), $version);
    }

    /**
     * Redirects a user that tried to access docs without specifying a version number
     *
     * @param string $docName The name of the document to retrieve
     * @return RedirectResponse The redirect
     */
    public function showNoVersionDoc(string $docName) : RedirectResponse
    {
        return new RedirectResponse(
            $this->urlGenerator->createFromName('docs', DocumentationConfig::DEFAULT_BRANCH, $docName)
        );
    }
}
