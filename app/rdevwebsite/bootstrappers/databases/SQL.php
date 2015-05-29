<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines the SQL bootstrapper
 */
namespace RDevWebsite\Bootstrappers\Databases;
use RDev\Applications\Bootstrappers\Bootstrapper;
use RDev\Applications\Bootstrappers\ILazyBootstrapper;
use RDev\Databases\ConnectionPool;
use RDev\Databases\PDO\PostgreSQL\Driver;
use RDev\Databases\SingleServerConnectionPool;
use RDev\Databases\Server;
use RDev\IoC\IContainer;

class SQL extends Bootstrapper implements ILazyBootstrapper
{
    /**
     * {@inheritdoc}
     */
    public function getBoundClasses()
    {
        return [ConnectionPool::class];
    }

    /**
     * {@inheritdoc}
     */
    public function registerBindings(IContainer $container)
    {
        $connectionPool = new SingleServerConnectionPool(
            new Driver(),
            new Server(
                $this->environment->getVariable("DB_HOST"),
                $this->environment->getVariable("DB_USER"),
                $this->environment->getVariable("DB_PASSWORD"),
                $this->environment->getVariable("DB_NAME"),
                $this->environment->getVariable("DB_PORT")
            )
        );
        $container->bind(ConnectionPool::class, $connectionPool);
    }
}