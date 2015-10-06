<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the session middleware
 */
namespace OpulenceWebsite\HTTP\Middleware;

use DateTime;
use Opulence\Framework\HTTP\Middleware\Session as BaseSession;
use Opulence\HTTP\Responses\Cookie;
use Opulence\HTTP\Responses\Response;

class Session extends BaseSession
{
    /** @var array|null The config array */
    private $config = null;

    /**
     * Runs garbage collection, if necessary
     */
    protected function gc()
    {
        $this->loadConfig();

        if (rand(1, $this->config["gc.divisor"]) <= $this->config["gc.chance"]) {
            $this->sessionHandler->gc($this->config["lifetime"]);
        }
    }

    /**
     * Writes any session data needed in the response
     *
     * @param Response $response The response to write to
     * @return Response The response with data written to it
     */
    protected function writeToResponse(Response $response)
    {
        $this->loadConfig();
        $response->getHeaders()->setCookie(
            new Cookie(
                $this->session->getName(),
                $this->session->getId(),
                new DateTime("+{$this->config["lifetime"]} seconds"),
                $this->config["cookie.path"],
                $this->config["cookie.domain"],
                $this->config["cookie.isSecure"],
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
        if ($this->config === null) {
            $this->config = require $this->paths["configs"] . "/http/sessions.php";;
        }
    }
}