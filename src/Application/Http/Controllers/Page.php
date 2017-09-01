<?php

/*
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2017 David Young
 * @license   https://github.com/opulencephp/Opulence/blob/master/LICENSE.md
 */

namespace Project\Application\Http\Controllers;

use Opulence\Http\Responses\Response;
use Opulence\Routing\Controller;

/**
 * Defines the page controller
 */
class Page extends Controller
{
    /**
     * Shows the homepage
     *
     * @return Response The response
     */
    public function showHomePage() : Response
    {
        $this->view = $this->viewFactory->createView('Home');

        return new Response($this->viewCompiler->compile($this->view));
    }

    /**
     * Shows the slack page
     *
     * @return Response The response
     */
    public function showSlackPage() : Response
    {
        $this->view = $this->viewFactory->createView('Slack');

        return new Response($this->viewCompiler->compile($this->view));
    }
}
