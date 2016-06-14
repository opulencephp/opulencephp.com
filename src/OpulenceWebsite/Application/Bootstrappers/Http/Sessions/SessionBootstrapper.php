<?php
/**
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2016 David Young
 * @license   https://github.com/opulencephp/opulencephp.com/blob/master/LICENSE.md
 */
namespace OpulenceWebsite\Application\Bootstrappers\Http\Sessions;

use Opulence\Cache\ArrayBridge;
use Opulence\Cache\FileBridge;
use Opulence\Cache\ICacheBridge;
use Opulence\Cache\MemcachedBridge;
use Opulence\Cache\RedisBridge;
use Opulence\Framework\Bootstrappers\Http\Sessions\SessionBootstrapper as BaseBootstrapper;
use Opulence\Ioc\IContainer;
use Opulence\Memcached\Memcached;
use Opulence\Redis\Redis;
use Opulence\Sessions\Handlers\CacheSessionHandler;
use Opulence\Sessions\Handlers\FileSessionHandler;
use Opulence\Sessions\Handlers\IEncryptableSessionHandler;
use Opulence\Sessions\ISession;
use Opulence\Sessions\Session;
use SessionHandlerInterface;

/**
 * Defines the session bootstrapper
 */
class SessionBootstrapper extends BaseBootstrapper
{
    /** @var array|null The config array */
    private $config = null;

    /**
     * Gets the session object to use
     *
     * @param IContainer $container The IoC Container
     * @return ISession The session to use
     */
    protected function getSession(IContainer $container) : ISession
    {
        $this->loadConfig();
        $session = new Session();
        $session->setName($this->config["name"]);

        return $session;
    }

    /**
     * Gets the session handler object to use
     *
     * @param IContainer $container The IoC Container
     * @return SessionHandlerInterface The session handler to use
     */
    protected function getSessionHandler(IContainer $container) : SessionHandlerInterface
    {
        $this->loadConfig();

        switch ($this->environment->getVar("SESSION_HANDLER")) {
            case CacheSessionHandler::class:
                $handler = new CacheSessionHandler($this->getCacheBridge($container), $this->config["lifetime"]);
                break;
            default: // FileSessionHandler
                $handler = new FileSessionHandler($this->config["file.path"]);
        }

        if ($this->config["isEncrypted"] && $handler instanceof IEncryptableSessionHandler) {
            $handler->useEncryption(true);
            $handler->setEncrypter($this->getSessionEncrypter($container));
        }

        return $handler;
    }

    /**
     * Gets the cache bridge to use for a cache session handler
     *
     * @param IContainer $container The IoC container
     * @return ICacheBridge The cache bridge
     */
    private function getCacheBridge(IContainer $container) : ICacheBridge
    {
        switch ($this->environment->getVar("SESSION_CACHE_BRIDGE")) {
            case ArrayBridge::class:
                return new ArrayBridge();
            case MemcachedBridge::class:
                return new MemcachedBridge(
                    $container->resolve(Memcached::class),
                    $this->config["cache.clientName"],
                    $this->config["cache.keyPrefix"]
                );
            case RedisBridge::class:
                return new RedisBridge(
                    $container->resolve(Redis::class),
                    $this->config["cache.clientName"],
                    $this->config["cache.keyPrefix"]
                );
            default: // FileBridge
                return new FileBridge($this->config["file.path"]);
        }
    }

    /**
     * Loads the configuration array
     */
    private function loadConfig()
    {
        if ($this->config === null) {
            $this->config = require $this->paths["config"] . "/http/sessions.php";;
        }
    }
}