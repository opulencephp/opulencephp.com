<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines an example controller
 */
namespace Project\HTTP\Controllers;
use RDev\HTTP\Responses;
use RDev\HTTP\Routing;
use RDev\Views\Compilers;
use RDev\Views\Factories;

class Page extends Routing\Controller
{
    /** @var Compilers\ICompiler The template compiler to use */
    protected $compiler = null;
    /** @var Factories\ITemplateFactory The factory to use to create templates */
    protected $templateFactory = null;

    /**
     * @param Compilers\ICompiler $compiler The template compiler to use
     * @param Factories\ITemplateFactory $templateFactory The factory to use to create templates
     */
    public function __construct(Compilers\ICompiler $compiler, Factories\ITemplateFactory $templateFactory)
    {
        $this->compiler = $compiler;
        $this->templateFactory = $templateFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function showHTTPError($statusCode)
    {
        $this->template = $this->templateFactory->create("HTTPError.php");
        $this->template->setVar("title", $statusCode . " Error");
        $this->template->setTag("errorTitle", $statusCode);

        switch($statusCode)
        {
            case 404:
                $this->template->setTag("errorTitle", "We couldn't find what you're looking for");
                $this->template->setTag("errorDescription", "Maybe you clicked on a bad link, or maybe you typed the URL incorrectly.");

                break;
            default:
                $this->template->setTag("errorTitle", "Uh oh");
                $this->template->setTag("errorDescription", "Something went wrong with your request.  We've been alerted to the issue, and we apologize for the inconvenience.");

                break;
        }

        return new Responses\Response($this->compiler->compile($this->template), $statusCode);
    }

    /**
     * Shows the homepage
     *
     * @return Responses\Response The response
     */
    public function showHomePage()
    {
        $this->template = $this->templateFactory->create("Home.php");

        return new Responses\Response($this->compiler->compile($this->template));
    }
}