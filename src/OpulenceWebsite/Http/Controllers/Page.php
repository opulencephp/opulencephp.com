<?php
/**
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2015 David Young
 * @license   https://github.com/opulencephp/opulencephp.com/blob/master/LICENSE.md
 */
namespace OpulenceWebsite\Http\Controllers;

use Opulence\Http\HttpException;
use Opulence\Http\Responses\Response;
use Opulence\Routing\Controller;

/**
 * Defines an example controller
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
        $this->view = $this->viewFactory->create("Home");

        return new Response($this->viewCompiler->compile($this->view));
    }

    public function showFoo()
    {
        $this->request->getHeaders()->set("CONTENT_TYPE", "application/json");

        throw new HttpException(404);
    }
}