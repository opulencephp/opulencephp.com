<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines the documentation page controller
 */
namespace RDevWebsite\HTTP\Controllers;
use RDevWebsite\Docs\Documentation;
use RDev\HTTP\Responses\RedirectResponse;
use RDev\HTTP\Responses\Response;
use RDev\Routing\Controller;
use RDev\Routing\URL\URLGenerator;
use RDev\Views\Compilers\ICompiler;
use RDev\Views\Factories\ITemplateFactory;

class Docs extends Controller
{
    /** @var Documentation The object used to grab documents */
    protected $docs = null;
    /** @var URLGenerator The URL generator */
    protected $urlGenerator = null;
    /** @var ICompiler The template compiler to use */
    protected $compiler = null;
    /** @var ITemplateFactory The factory to use to create templates */
    protected $templateFactory = null;

    /**
     * @param Documentation $docs The object used to grab documents
     * @param URLGenerator $urlGenerator The URL generator
     * @param ICompiler $compiler The template compiler to use
     * @param ITemplateFactory $templateFactory The factory to use to create templates
     */
    public function __construct(
        Documentation $docs,
        URLGenerator $urlGenerator,
        ICompiler $compiler,
        ITemplateFactory $templateFactory
    )
    {
        $this->docs = $docs;
        $this->urlGenerator = $urlGenerator;
        $this->compiler = $compiler;
        $this->templateFactory = $templateFactory;
        $this->template = $this->templateFactory->create("Docs.php");
    }

    /**
     * Shows a page with documentation
     *
     * @param string $docName The name of the document to retrieve
     * @param string $version The RDev version to retrieve
     * @return Response The page
     */
    public function showDoc($docName, $version = Documentation::DEFAULT_BRANCH)
    {
        $docs = $this->docs->getFlattenedDocs($version);
        $this->template->setVar("version", $version);
        $this->template->setVar("doc", $this->docs->getCompiledDoc($docName, $version));
        $this->template->setVar("docs", $this->docs->getDocs($version));
        $this->template->setVar("title", $docs[$docName]["title"]);
        $this->template->setVar("docName", $docName);
        $this->template->setVar("docVersion", $version);
        $this->template->setVar("metaKeywords", $docs[$docName]["keywords"]);
        $this->template->setVar("metaDescription", $docs[$docName]["description"]);

        return new Response($this->compiler->compile($this->template));
    }

    /**
     * Shows the index doc page
     *
     * @param string $version The RDev version to retrieve
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