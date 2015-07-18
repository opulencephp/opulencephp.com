<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines an example controller
 */
namespace OpulenceWebsite\HTTP\Controllers;
use Opulence\HTTP\Responses\Response;
use Opulence\Routing\Controller;
use Opulence\Views\Compilers\ICompiler;
use Opulence\Views\Factories\ITemplateFactory;

class Page extends Controller
{
    /** @var ICompiler The template compiler to use */
    protected $compiler = null;
    /** @var ITemplateFactory The factory to use to create templates */
    protected $templateFactory = null;

    /**
     * @param ICompiler $compiler The template compiler to use
     * @param ITemplateFactory $templateFactory The factory to use to create templates
     */
    public function __construct(ICompiler $compiler, ITemplateFactory $templateFactory)
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

        return new Response($this->compiler->compile($this->template), $statusCode);
    }

    /**
     * Shows the homepage
     *
     * @return Response The response
     */
    public function showHomePage()
    {
        $this->template = $this->templateFactory->create("Home.php");

        return new Response($this->compiler->compile($this->template));
    }
}