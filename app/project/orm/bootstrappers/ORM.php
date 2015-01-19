<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the ORM bootstrapper
 */
namespace Project\ORM\Bootstrappers;
use RDev\Applications\Bootstrappers;
use RDev\Databases\SQL;
use RDev\ORM as RDevORM;
use RDev\IoC;

class ORM implements Bootstrappers\IBootstrapper
{
    /** @var IoC\IContainer The dependency injection container to use */
    private $container = null;
    /** @var SQL\ConnectionPool The SQL connection pool */
    private $connectionPool = null;

    /**
     * @param IoC\IContainer $container The dependency injection container to use
     * @param SQL\ConnectionPool $connectionPool The SQL connection pool
     */
    public function __construct(IoC\IContainer $container, SQL\ConnectionPool $connectionPool)
    {
        $this->container = $container;
        $this->connectionPool = $connectionPool;
    }

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        $unitOfWork = new RDevORM\UnitOfWork($this->connectionPool->getWriteConnection(), new RDevORM\EntityRegistry());
        $this->container->bind("RDev\\ORM\\UnitOfWork", $unitOfWork);
    }
}