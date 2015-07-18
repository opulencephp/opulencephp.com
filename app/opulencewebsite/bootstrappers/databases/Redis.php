<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the Redis bootstrapper
 */
namespace OpulenceWebsite\Bootstrappers\Databases;
use Opulence\Applications\Bootstrappers\Bootstrapper;
use Opulence\Applications\Bootstrappers\ILazyBootstrapper;
use Opulence\IoC\IContainer;
use Opulence\Redis\IRedis;
use Opulence\Redis\OpulencePHPRedis;
use Opulence\Redis\Server;
use Opulence\Redis\TypeMapper;

class Redis extends Bootstrapper implements ILazyBootstrapper
{
    /**
     * {@inheritdoc}
     */
    public function getBindings()
    {
        return [IRedis::class];
    }

    /**
     * {@inheritdoc}
     */
    public function registerBindings(IContainer $container)
    {
        $redis = new OpulencePHPRedis(
            new Server(
                $this->environment->getVariable("REDIS_HOST"),
                $this->environment->getVariable("REDIS_PASSWORD"),
                $this->environment->getVariable("REDIS_PORT")
            ),
            new TypeMapper()
        );
        $container->bind([IRedis::class, OpulencePHPRedis::class], $redis);
    }
}