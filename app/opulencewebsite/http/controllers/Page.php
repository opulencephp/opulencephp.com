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
use Opulence\Views\Factories\IViewFactory;

class Page extends Controller
{
    /** @var ICompiler The view compiler to use */
    protected $compiler = null;
    /** @var IViewFactory The factory to use to create views */
    protected $viewFactory = null;

    /**
     * @param ICompiler $compiler The view compiler to use
     * @param IViewFactory $viewFactory The factory to use to create views
     */
    public function __construct(ICompiler $compiler, IViewFactory $viewFactory)
    {
        $this->compiler = $compiler;
        $this->viewFactory = $viewFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function showHTTPError($statusCode)
    {
        $this->view = $this->viewFactory->create("HTTPError.fortune");
        $this->view->setVar("title", $statusCode . " Error");
        $this->view->setVar("errorTitle", $statusCode);

        switch($statusCode)
        {
            case 404:
                $this->view->setVar("errorTitle", "We couldn't find what you're looking for");
                $this->view->setVar("errorDescription", "Maybe you clicked on a bad link, or maybe you typed the URL incorrectly.");

                break;
            default:
                $this->view->setVar("errorTitle", "Uh oh");
                $this->view->setVar("errorDescription", "Something went wrong with your request.  We've been alerted to the issue, and we apologize for the inconvenience.");

                break;
        }

        return new Response($this->compiler->compile($this->view), $statusCode);
    }

    /**
     * Shows the homepage
     *
     * @return Response The response
     */
    public function showHomePage()
    {
        $this->view = $this->viewFactory->create("Home.fortune");

        return new Response($this->compiler->compile($this->view));
    }
}