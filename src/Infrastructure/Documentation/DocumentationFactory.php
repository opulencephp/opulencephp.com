<?php

/*
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2021 David Young
 * @license   https://github.com/opulencephp/Opulence/blob/master/LICENSE.md
 */

namespace Project\Infrastructure\Documentation;

use Opulence\Files\FileSystem;
use Project\Domain\Documentation\Factories\IDocumentationFactory;

/**
 * Defines the documentation factory
 */
class DocumentationFactory implements IDocumentationFactory
{
    /** @var FileSystem The file system */
    private $files = null;
    /** @var string The permanent location for compiled docs */
    private $compiledDocPath = '';

    /**
     * @param FileSystem $files The file system
     * @param string $compiledDocPath The permanent location for compiled docs
     */
    public function __construct(
        FileSystem $files,
        string $compiledDocPath
    ) {
        $this->files = $files;
        $this->compiledDocPath = $compiledDocPath;
    }

    /**
     * @inheritdoc
     */
    public function createDocument(string $name, string $version) : string
    {
        return $this->files->read("{$this->compiledDocPath}/$version/$name.html");
    }
}
