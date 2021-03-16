<?php

/*
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2021 David Young
 * @license   https://github.com/opulencephp/Opulence/blob/master/LICENSE.md
 */

namespace Project\Application\Bootstrappers\Documentation;

use Opulence\Files\FileSystem;
use Opulence\Framework\Configuration\Config;
use Opulence\Ioc\Bootstrappers\Bootstrapper;
use Opulence\Ioc\Bootstrappers\ILazyBootstrapper;
use Opulence\Ioc\IContainer;
use Parsedown;
use Project\Application\Config\DocumentationConfig;
use Project\Domain\Documentation\Compilers\IApiCompiler;
use Project\Domain\Documentation\Compilers\IDocumentationCompiler;
use Project\Domain\Documentation\Factories\IDocumentationFactory;
use Project\Infrastructure\Documentation\Compilers\ApiCompiler;
use Project\Infrastructure\Documentation\Compilers\DocumentationCompiler;
use Project\Infrastructure\Documentation\DocumentationFactory;

/**
 * Defines the documentation bootstrapper
 */
class DocumentationBootstrapper extends Bootstrapper implements ILazyBootstrapper
{
    /**
     * @inheritdoc
     */
    public function getBindings() : array
    {
        return [DocumentationConfig::class, IDocumentationCompiler::class, IApiCompiler::class];
    }

    /**
     * @inheritdoc
     */
    public function registerBindings(IContainer $container) : void
    {
        $fileSystem = $container->resolve(FileSystem::class);
        $documentationConfig = require Config::get('paths', 'config') . '/documentation.php';
        $container->bindInstance(DocumentationConfig::class, new DocumentationConfig($documentationConfig));
        $container->bindInstance(
            IDocumentationFactory::class,
            new DocumentationFactory($fileSystem, Config::get('paths', 'docs.compiled'))
        );
        $container->bindInstance(
            IDocumentationCompiler::class,
            new DocumentationCompiler(
                $documentationConfig,
                new Parsedown(),
                $fileSystem,
                Config::get('paths', 'tmp.docs'),
                Config::get('paths', 'docs.compiled')
            )
        );
        $container->bindInstance(
            IApiCompiler::class,
            new ApiCompiler(
                $container->resolve(FileSystem::class),
                Config::get('paths', 'config'),
                Config::get('paths', 'public'),
                Config::get('paths', 'tmp.api'),
                Config::get('paths', 'vendor')
            )
        );
    }
}
