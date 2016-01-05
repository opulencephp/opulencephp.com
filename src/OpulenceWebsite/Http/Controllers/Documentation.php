<?php
/**
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2016 David Young
 * @license   https://github.com/opulencephp/opulencephp.com/blob/master/LICENSE.md
 */
namespace OpulenceWebsite\Http\Controllers;

use Opulence\Http\Responses\RedirectResponse;
use Opulence\Http\Responses\Response;
use Opulence\Routing\Controller;
use Opulence\Routing\Urls\UrlGenerator;
use OpulenceWebsite\Documentation\Documentation as DocumentationWrapper;

/**
 * Defines the documentation page controller
 */
class Documentation extends Controller
{
    /** @var Documentation The object used to grab documents */
    protected $docs = null;
    /** @var UrlGenerator The URL generator */
    protected $urlGenerator = null;

    /**
     * @param DocumentationWrapper $docs The object used to grab documents
     * @param UrlGenerator $urlGenerator The URL generator
     */
    public function __construct(DocumentationWrapper $docs, UrlGenerator $urlGenerator)
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
    public function showDoc(string $docName, string $version = DocumentationWrapper::DEFAULT_BRANCH) : Response
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
    public function showIndex(string $version = DocumentationWrapper::DEFAULT_BRANCH) : Response
    {
        return $this->showDoc($this->docs->getDefaultDoc($version), $version);
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
            $this->urlGenerator->createFromName("docs", DocumentationWrapper::DEFAULT_BRANCH, $docName)
        );
    }
}