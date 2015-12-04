<?php
/**
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2015 David Young
 * @license   https://github.com/opulencephp/opulencephp.com/blob/master/LICENSE.md
 */
namespace OpulenceWebsite\Bootstrappers\Documentation;

use Opulence\Bootstrappers\Bootstrapper;
use Opulence\Bootstrappers\ILazyBootstrapper;
use Opulence\Files\FileSystem;
use Opulence\Ioc\IContainer;
use OpulenceWebsite\Documentation\Documentation;
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
        return [Documentation::class];
    }

    /**
     * @inheritdoc
     */
    public function registerBindings(IContainer $container)
    {
        $container->bind(
            Documentation::class,
            new Documentation(
                require "{$this->paths["config"]}/documentation.php",
                new Parsedown(),
                $this->paths,
                $container->makeShared(FileSystem::class)
            )
        );
    }
}