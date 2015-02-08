<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Pulls in documents
 */
namespace Project\Docs;
use Parsedown;
use RDev\Applications;
use RDev\Files;

class Documentation
{
    /** The GitHub docs repository */
    const GITHUB_REPOSITORY = "https://github.com/ramblingsofadev/docs.git";
    /** @var array The mapping of document names to their page names */
    public static $docsToPageNames = [
        "Getting Started" => [
            "installing" => "Installing",
            "directorystructure" => "Directory Structure"
        ],
        "Main" => [
            "application" => "Application",
            "console" => "Console",
            "ioc" => "Dependency Injection",
            "files" => "File System",
            "http" => "HTTP",
            "nosql" => "NoSQL Databases",
            "orm" => "ORM",
            "querybuilders" => "Query Builders",
            "rdbms" => "Relational Databases",
            "routing" => "Routing",
            "typemappers" => "Type Mappers",
            "views" => "Views"
        ]
    ];
    /** @var Parsedown The parsedown object to use */
    private $parsedown = null;
    /** @var Applications\Paths The application paths */
    private $paths = null;
    /** @var Files\FileSystem The file system */
    private $files = null;

    /**
     * @param Parsedown $parsedown The parsedown object to use
     * @param Applications\Paths $paths The application paths
     * @param Files\FileSystem $files The file system
     */
    public function __construct(Parsedown $parsedown, Applications\Paths $paths, Files\FileSystem $files)
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
        $rawDocsPath = $this->paths["tmp"] . "/docs";
        $gitOutput = shell_exec(
            sprintf(
                "rm -rf %s* && mkdir %s && cd %s && git clone %s .",
                $rawDocsPath,
                $rawDocsPath,
                $rawDocsPath,
                self::GITHUB_REPOSITORY
            )
        );

        $markdownFiles = $this->files->glob("$rawDocsPath/*.md");

        foreach($markdownFiles as $index => $markdownFile)
        {
            $html = $this->parsedown->text($this->files->read($markdownFile));
            $compiledDocFilename = "{$this->paths['compiledDocs']}/{$this->files->getFileName($markdownFile)}.html";
            $this->files->write($compiledDocFilename, $html);
        }

        return $gitOutput;
    }

    /**
     * Gets the parsed document
     *
     * @param string $name The name of the document we want
     * @return string The parsed document
     * @throws Files\FileSystemException Thrown if no document exists with the input name
     */
    public function getCompiledDoc($name)
    {
        return $this->files->read($this->paths["compiledDocs"] . "/$name.html");
    }
}