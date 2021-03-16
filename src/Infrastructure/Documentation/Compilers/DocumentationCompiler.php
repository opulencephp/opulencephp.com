<?php

/*
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2021 David Young
 * @license   https://github.com/opulencephp/Opulence/blob/master/LICENSE.md
 */

namespace Project\Infrastructure\Documentation\Compilers;

use Opulence\Files\FileSystem;
use Parsedown;
use Project\Domain\Documentation\Compilers\IDocumentationCompiler;

/**
 * Defines the documentation compiler
 */
class DocumentationCompiler implements IDocumentationCompiler
{
    /** @var array The config for the docs */
    private $config = [];
    /** @var Parsedown The parsedown object to use */
    private $parsedown = null;
    /** @var FileSystem The file system */
    private $files = null;
    /** @var string The temporary location for cloned docs */
    private $clonedDocPath = '';
    /** @var string The permanent location for compiled docs */
    private $compiledDocPath = '';

    /**
     * @param array $config The config for the docs
     * @param Parsedown $parsedown The parsedown object to use
     * @param FileSystem $files The file system
     * @param string $clonedDocPath The temporary location for cloned docs
     * @param string $compiledDocPath The permanent location for compiled docs
     */
    public function __construct(
        array $config,
        Parsedown $parsedown,
        FileSystem $files,
        string $clonedDocPath,
        string $compiledDocPath
    ) {
        $this->config = $config;
        $this->parsedown = $parsedown;
        $this->files = $files;
        $this->clonedDocPath = $clonedDocPath;
        $this->compiledDocPath = $compiledDocPath;
    }

    /**
     * @inheritdoc
     */
    public function compile() : string
    {
        $gitOutput = '';

        foreach ($this->config as $branchName => $branchData) {
            $rawDocsPath = "{$this->clonedDocPath}/$branchName";
            $compiledDocsPath = "{$this->compiledDocPath}/$branchName";

            /**
             * When cloning from GitHub, some files in the .git directory are read-only, which means we cannot delete
             * them using normal PHP commands.  So, we first chmod all the files, then delete them.
             */
            foreach ($this->files->getFiles($rawDocsPath, true) as $file) {
                chmod($file, 0777);
            }

            $this->files->deleteDirectory($rawDocsPath);
            $this->files->makeDirectory($rawDocsPath);

            // Clone the branch from GitHub into our temporary directory
            $gitOutput .= shell_exec(
                sprintf(
                    'git clone -b %s --single-branch %s %s',
                    $branchName,
                    self::GITHUB_REPOSITORY,
                    $rawDocsPath
                )
            );

            if (!$this->files->exists($compiledDocsPath)) {
                $this->files->makeDirectory($compiledDocsPath);
            }

            $markdownFiles = $this->files->glob("$rawDocsPath/*.md");

            // Convert the Markdown files into HTML and store them in the resources directory
            foreach ($markdownFiles as $index => $markdownFile) {
                $html = $this->parsedown->text($this->files->read($markdownFile));
                $compiledDocFilename = sprintf(
                    '%s/%s/%s.html',
                    $this->compiledDocPath,
                    $branchName,
                    $this->files->getFileName($markdownFile)
                );
                $this->files->write($compiledDocFilename, $html);
            }
        }

        return $gitOutput;
    }
}
