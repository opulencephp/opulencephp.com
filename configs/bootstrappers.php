<?php
/**
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2015 David Young
 * @license   https://github.com/opulencephp/opulencephp.com/blob/master/LICENSE.md
 */
use Opulence\Framework\Bootstrappers\Cryptography\CryptographyBootstrapper;
use Opulence\Framework\Bootstrappers\Php\PhpBootstrapper;
use OpulenceWebsite\Bootstrappers\Documentation\DocumentationBootstrapper;

/**
 * ----------------------------------------------------------
 * Define the bootstrapper classes for all applications
 * ----------------------------------------------------------
 */
return [
    PhpBootstrapper::class,
    CryptographyBootstrapper::class,
    DocumentationBootstrapper::class
];