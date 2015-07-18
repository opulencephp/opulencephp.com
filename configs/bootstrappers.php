<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the list of bootstrapper classes to load
 */
use Opulence\Framework\Bootstrappers\Cryptography\Cryptography;
use OpulenceWebsite\Bootstrappers\Databases\SQL;
use OpulenceWebsite\Bootstrappers\Events\Dispatcher;
use OpulenceWebsite\Bootstrappers\ORM\UnitOfWork;

return [
    Cryptography::class,
    Dispatcher::class,
    SQL::class,
    UnitOfWork::class
];