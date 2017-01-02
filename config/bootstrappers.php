<?php
/**
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2017 David Young
 * @license   https://github.com/opulencephp/opulencephp.com/blob/master/LICENSE.md
 */
use Opulence\Framework\Cryptography\Bootstrappers\CryptographyBootstrapper;
use OpulenceWebsite\Application\Bootstrappers\Documentation\DocumentationBootstrapper;
use OpulenceWebsite\Application\Bootstrappers\Validation\ValidatorBootstrapper;

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