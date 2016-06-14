<?php
/**
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2016 David Young
 * @license   https://github.com/opulencephp/opulencephp.com/blob/master/LICENSE.md
 */
namespace OpulenceWebsite\Application\Bootstrappers\Documentation;

use Opulence\Bootstrappers\Bootstrapper;
use Opulence\Bootstrappers\ILazyBootstrapper;
use Opulence\Files\FileSystem;
use Opulence\Ioc\IContainer;
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
        return [Documentation::class];
    }

    /**
     * @inheritdoc
     */
    public function registerBindings(IContainer $container)
    {
        $container->bindInstance(
            Documentation::class,
            new Documentation(
                require "{$this->paths["config"]}/documentation.php",
                new Parsedown(),
                $this->paths,
                $container->resolve(FileSystem::class)
            )
        );
    }
}