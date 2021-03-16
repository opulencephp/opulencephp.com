<?php

/*
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2021 David Young
 * @license   https://github.com/opulencephp/Opulence/blob/master/LICENSE.md
 */

use Opulence\Framework\Cryptography\Bootstrappers\CryptographyBootstrapper;
use Project\Application\Bootstrappers\Documentation\DocumentationBootstrapper;
use Project\Application\Bootstrappers\Validation\ValidatorBootstrapper;

/**
 * ----------------------------------------------------------
 * Define the bootstrapper classes for all applications
 * ----------------------------------------------------------
 */
return [
    CryptographyBootstrapper::class,
    DocumentationBootstrapper::class,
    ValidatorBootstrapper::class
];
