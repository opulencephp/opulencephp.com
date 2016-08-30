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
use OpulenceWebsite\Domain\Documentation\Api;
use OpulenceWebsite\Domain\Documentation\Documentation;
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
        return [Documentation::class, Api::class];
    }

    /**
     * @inheritdoc
     */
    public function registerBindings(IContainer $container)
    {
        $container->bindInstance(
            Documentation::class,
            new Documentation(
                require Config::get("paths", "config") . "/documentation.php",
                new Parsedown(),
                $container->resolve(FileSystem::class),
                Config::get("paths", "tmp.docs"),
                Config::get("paths", "docs.compiled")
            )
        );
        $container->bindInstance(
            Api::class,
            new Api(
                $container->resolve(FileSystem::class),
                Config::get("paths", "config"),
                Config::get("paths", "public"),
                Config::get("paths", "tmp.api"),
                Config::get("paths", "vendor")
            )
        );
    }
}