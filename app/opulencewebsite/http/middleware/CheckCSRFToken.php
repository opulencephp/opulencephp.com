<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the middleware that checks the CSRF token
 */
namespace OpulenceWebsite\HTTP\Middleware;

use DateTime;
use Opulence\Framework\HTTP\CSRFTokenChecker;
use Opulence\Framework\HTTP\Middleware\CheckCSRFToken as BaseMiddleware;
use Opulence\HTTP\Responses\Cookie;
use Opulence\HTTP\Responses\Response;

class CheckCSRFToken extends BaseMiddleware
{
    /** @var array|null The config array */
    private $config = null;

    /**
     * Writes data to the response
     *
     * @param Response $response The response to write to
     * @return Response The response with the data written to it
     */
    protected function writeToResponse(Response $response)
    {
        $this->loadConfig();
        // Add an XSRF cookie for JavaScript frameworks to use
        $response->getHeaders()->setCookie(
            new Cookie(
                "XSRF-TOKEN",
                $this->session->get(CSRFTokenChecker::TOKEN_INPUT_NAME),
                new DateTime("+{$this->config["xsrfcookie.lifetime"]} seconds"),
                $this->config["cookie.path"],
                $this->config["cookie.domain"],
                false,
                false
            )
        );

        return $response;
    }

    /**
     * Loads the configuration array
     */
    private function loadConfig()
    {
        if($this->config === null)
        {
            $this->config = require $this->paths["configs"] . "/http/sessions.php";;
        }
    }
}