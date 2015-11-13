<?php
/**
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2015 David Young
 * @license   https://github.com/opulencephp/Opulence/blob/master/LICENSE.md
 */
namespace OpulenceWebsite\Docs;

use Parsedown;
use Opulence\Applications\Paths;
use Opulence\Files\FileSystem;
use Opulence\Files\FileSystemException;

/**
 * Pulls in documents
 */
class  Documentation
{
    /** The GitHub docs repository */
    const GITHUB_REPOSITORY = "https://github.com/opulencephp/docs.git";
    /** The default branch to show in the docs */
    const DEFAULT_BRANCH = "1.0";
    /** @var Parsedown The parsedown object to use */
    private $parsedown = null;
    /** @var Paths The application paths */
    private $paths = null;
    /** @var FileSystem The file system */
    private $files = null;

    /**
     * @param Parsedown $parsedown The parsedown object to use
     * @param Paths $paths The application paths
     * @param FileSystem $files The file system
     */
    public function __construct(Parsedown $parsedown, Paths $paths, FileSystem $files)
    {
        $this->parsedown = $parsedown;
        $this->paths = $paths;
        $this->files = $files;
    }

    /**
     * Fetches and compiles the docs from GitHub
     *
     * @return string The output of the retrieval
     */
    public function compile()
    {
        $gitOutput = "";

        foreach (DocumentationConfig::$config as $branchName => $branchData) {
            $rawDocsPath = "{$this->paths["tmp.docs"]}/$branchName";
            $compiledDocsPath = "{$this->paths["docs.compiled"]}/$branchName";

            // Clone the branch from GitHub into our temporary directory
            $gitOutput .= shell_exec(
                sprintf(
                    "rm -rf %s* && mkdir %s && cd %s && git clone -b %s --single-branch %s .",
                    $rawDocsPath,
                    $rawDocsPath,
                    $rawDocsPath,
                    $branchName,
                    self::GITHUB_REPOSITORY
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
                    "%s/%s/%s.html",
                    $this->paths['docs.compiled'],
                    $branchName,
                    $this->files->getFileName($markdownFile)
                );
                $this->files->write($compiledDocFilename, $html);
            }
        }

        return $gitOutput;
    }

    /**
     * Gets the branch names to their titles
     *
     * @return array The mapping of branch names to their titles
     */
    public function getBranchTitles()
    {
        $titles = [];

        foreach (DocumentationConfig::$config as $name => $data) {
            $titles[$name] = $data["title"];
        }

        return $titles;
    }

    /**
     * Gets the parsed document
     *
     * @param string $name The name of the document we want
     * @param string $version The version of Opulence we want
     * @return string The parsed document
     * @throws FileSystemException Thrown if no document exists with the input name
     */
    public function getCompiledDoc($name, $version)
    {
        return $this->files->read("{$this->paths["docs.compiled"]}/$version/$name.html");
    }

    /**
     * Gets the name of the default doc for a version
     *
     * @param string $version The version to get
     * @return string The default doc
     */
    public function getDefaultDoc($version)
    {
        return DocumentationConfig::$config[$version]["default"];
    }

    /**
     * Gets the docs for a version
     *
     * @param string $version The version to get
     * @return string The docs
     */
    public function getDocs($version)
    {
        return DocumentationConfig::$config[$version]["docs"];
    }

    /**
     * Gets all of the docs for a branch as a flattened array
     *
     * @param string $version The version to get
     * @return array The flattened docs
     */
    public function getFlattenedDocs($version)
    {
        $flattenedDocs = [];

        foreach (DocumentationConfig::$config[$version]["docs"] as $sectionHeader => $docs) {
            $flattenedDocs = array_merge($flattenedDocs, $docs);
        }

        return $flattenedDocs;
    }

    /**
     * Gets whether or not a doc exists for a specific version
     *
     * @param string $version The name of the version to get
     * @param string $name The name of the document
     * @return bool True if the document exists, otherwise false
     */
    public function hasDoc($version, $name)
    {
        if (!isset(DocumentationConfig::$config[$version])) {
            return false;
        }

        $docs = $this->getFlattenedDocs($version);

        return isset($docs[$name]);
    }

    /**
     * Gets whether or not a version has docs
     *
     * @param string $version The name of the version to get
     * @return bool True if the version exists, otherwise false
     */
    public function hasVersion($version)
    {
        return isset(DocumentationConfig::$config[$version]);
    }
}