<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the list of bootstrapper classes to load
 */
use RDev\Framework\Bootstrappers\Cryptography\Cryptography;
use RDevWebsite\Bootstrappers\Databases\SQL;
use RDevWebsite\Bootstrappers\Events\Dispatcher;
use RDevWebsite\Bootstrappers\ORM\UnitOfWork;

return [
    Cryptography::class,
    Dispatcher::class,
    SQL::class,
    UnitOfWork::class
];