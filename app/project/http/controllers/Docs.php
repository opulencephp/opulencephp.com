<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines the documentation page controller
 */
namespace Project\HTTP\Controllers;
use Project\Docs as ProjectDocs;
use RDev\HTTP\Responses;
use RDev\HTTP\Routing;
use RDev\HTTP\Routing\URL;
use RDev\Views\Compilers;
use RDev\Views\Factories;

class Docs extends Routing\Controller
{
    /** @var ProjectDocs\Documentation The object used to grab documents */
    protected $docs = null;
    /** @var URL\URLGenerator The URL generator */
    protected $urlGenerator = null;
    /** @var Compilers\ICompiler The template compiler to use */
    protected $compiler = null;
    /** @var Factories\ITemplateFactory The factory to use to create templates */
    protected $templateFactory = null;

    /**
     * @param ProjectDocs\Documentation $docs The object used to grab documents
     * @param URL\URLGenerator $urlGenerator The URL generator
     * @param Compilers\ICompiler $compiler The template compiler to use
     * @param Factories\ITemplateFactory $templateFactory The factory to use to create templates
     */
    public function __construct(
        ProjectDocs\Documentation $docs,
        URL\URLGenerator $urlGenerator,
        Compilers\ICompiler $compiler,
        Factories\ITemplateFactory $templateFactory
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
     * @return Responses\Response The page
     */
    public function showDoc($docName, $version = "master")
    {
        $this->template->setVar("version", $version);
        // Flatten all the docs into a 1-dimensional array
        $docs = array_merge(
            ProjectDocs\Documentation::$docData["Getting Started"],
            ProjectDocs\Documentation::$docData["Framework"]
        );

        if(!isset($docs[$docName]))
        {
            // This is our default
            $docName = "installation";
        }

        $this->template->setTag("doc", $this->docs->getCompiledDoc($docName));
        $this->setTitle($docs[$docName]["title"]);
        $this->template->setVar("metaKeywords", $docs[$docName]["keywords"]);
        $this->template->setVar("metaDescription", $docs[$docName]["description"]);

        return new Responses\Response($this->compiler->compile($this->template));
    }

    /**
     * Shows the index doc page
     *
     * @param string $version The RDev version to retrieve
     * @return Responses\Response The index page
     */
    public function showIndex($version = "master")
    {
        return $this->showDoc("installing", $version);
    }

    /**
     * Redirects a user that tried to access docs without specifying a version number
     *
     * @param string $docName The name of the document to retrieve
     * @return Responses\RedirectResponse The redirect
     */
    public function showNoVersionDoc($docName)
    {
        return new Responses\RedirectResponse(
            $this->urlGenerator->createFromName("docs", ["master", $docName])
        );
    }

    /**
     * Sets a formatted title for a page
     *
     * @param string $title The title of the page
     */
    private function setTitle($title)
    {
        $this->template->setVar("title", "$title | RDev");
    }
}