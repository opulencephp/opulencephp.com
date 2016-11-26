<?php
/**
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2016 David Young
 * @license   https://github.com/opulencephp/opulencephp.com/blob/master/LICENSE.md
 */
namespace OpulenceWebsite\Application\Bootstrappers\Documentation;

use Opulence\Files\FileSystem;
use Opulence\Framework\Configuration\Config;
use Opulence\Ioc\Bootstrappers\Bootstrapper;
use Opulence\Ioc\Bootstrappers\ILazyBootstrapper;
use Opulence\Ioc\IContainer;
use OpulenceWebsite\Application\Config\DocumentationConfig;
use OpulenceWebsite\Domain\Documentation\Compilers\IApiCompiler;
use OpulenceWebsite\Domain\Documentation\Compilers\IDocumentationCompiler;
use OpulenceWebsite\Domain\Documentation\Factories\IDocumentationFactory;
use OpulenceWebsite\Infrastructure\Documentation\Compilers\ApiCompiler;
use OpulenceWebsite\Infrastructure\Documentation\Compilers\DocumentationCompiler;
use OpulenceWebsite\Infrastructure\Documentation\DocumentationFactory;
use Parsedown;

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
    public function registerBindings(IContainer $container)
    {
        $fileSystem = $container->resolve(FileSystem::class);
        $documentationConfig = require Config::get("paths", "config") . "/documentation.php";
        $container->bindInstance(DocumentationConfig::class, new DocumentationConfig($documentationConfig));
        $container->bindInstance(
            IDocumentationFactory::class,
            new DocumentationFactory($fileSystem, Config::get("paths", "docs.compiled"))
        );
        $container->bindInstance(
            IDocumentationCompiler::class,
            new DocumentationCompiler(
                $documentationConfig,
                new Parsedown(),
                $fileSystem,
                Config::get("paths", "tmp.docs"),
                Config::get("paths", "docs.compiled")
            )
        );
        $container->bindInstance(
            IApiCompiler::class,
            new ApiCompiler(
                $container->resolve(FileSystem::class),
                Config::get("paths", "config"),
                Config::get("paths", "public"),
                Config::get("paths", "tmp.api"),
                Config::get("paths", "vendor")
            )
        );
    }
}