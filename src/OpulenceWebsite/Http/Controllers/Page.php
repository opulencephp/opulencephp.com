<?php
/**
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2015 David Young
 * @license   https://github.com/opulencephp/opulencephp.com/blob/master/LICENSE.md
 */
namespace OpulenceWebsite\Http\Controllers;

use Opulence\Http\Responses\Response;
use Opulence\Routing\Controller;

/**
 * Defines an example controller
 */
class Page extends Controller
{
    /**
     * @inheritdoc
     */
    public function showHttpError($statusCode)
    {
        $this->view = $this->viewFactory->create("HttpError");
        $this->view->setVar("title", $statusCode . " Error");
        $this->view->setVar("errorTitle", $statusCode);

        switch ($statusCode) {
            case 404:
                $this->view->setVar("errorTitle", "We couldn't find what you're looking for");
                $this->view->setVar("errorDescription",
                    "Maybe you clicked on a bad link, or maybe you typed the URL incorrectly.");

                break;
            default:
                $this->view->setVar("errorTitle", "Uh oh");
                $this->view->setVar("errorDescription",
                    "Something went wrong with your request.  We've been alerted to the issue, and we apologize for the inconvenience.");

                break;
        }

        return new Response($this->viewCompiler->compile($this->view), $statusCode);
    }

    /**
     * Shows the homepage
     *
     * @return Response The response
     */
    public function showHomePage()
    {
        $this->view = $this->viewFactory->create("Home");

        return new Response($this->viewCompiler->compile($this->view));
    }
}