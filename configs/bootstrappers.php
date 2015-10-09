<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the list of bootstrapper classes to load
 */
use Opulence\Framework\Bootstrappers\Cryptography\CryptographyBootstrapper;
use Opulence\Framework\Bootstrappers\PHP\PHPBootstrapper;

return [
    PHPBootstrapper::class,
    CryptographyBootstrapper::class
];