<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the list of bootstrapper classes to load
 */
use RDev\Framework\Bootstrappers\Cryptography\Cryptography;
use RDevWebsite\Bootstrappers\Authentication\Credentials;
use RDevWebsite\Bootstrappers\Databases\SQL;
use RDevWebsite\Bootstrappers\ORM\UnitOfWork;

/**
 * ----------------------------------------------------------
 * List of bootstrapper classes
 * ----------------------------------------------------------
 */
return [
    /**
     * ----------------------------------------------------------
     * RDev bootstrappers
     * ----------------------------------------------------------
     *
     * Keep these bootstrappers unless you want to customize anything that they bind
     */
    Cryptography::class,

    /**
     * ----------------------------------------------------------
     * Your bootstrappers
     * ----------------------------------------------------------
     *
     * List any console bootstrappers you'd like here
     * To enable Redis, add "RDevWebsite\\Bootstrappers\\Databases\\Redis"
     */
    Credentials::class,
    SQL::class,
    UnitOfWork::class
];