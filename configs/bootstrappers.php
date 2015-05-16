<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the list of bootstrapper classes to load
 */
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
    "RDev\\Framework\\Bootstrappers\\Cryptography\\Cryptography",
    /**
     * ----------------------------------------------------------
     * Your bootstrappers
     * ----------------------------------------------------------
     *
     * List any console bootstrappers you'd like here
     * To enable Redis, add "RDevWebsite\\Bootstrappers\\Databases\\Redis"
     */
    "RDevWebsite\\Bootstrappers\\Authentication\\Credentials",
    "RDevWebsite\\Bootstrappers\\Databases\\SQL",
    "RDevWebsite\\Bootstrappers\\ORM\\UnitOfWork"
];