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
    public static $docData = [
        "Getting Started" => [
            "installing" => [
                "title" => "Installing",
                "description" => "Learn how to install RDev",
                "keywords" => ["rdev", "install", "php"]
            ],
            "directory-structure" => [
                "title" => "Directory Structure",
                "description" => "Learn about how RDev is structured",
                "keywords" => ["rdev", "structure", "php"]
            ]
        ],
        "Framework" => [
            "application" => [
                "title" => "Application",
                "description" => "Learn about the inner-workings of an RDev application",
                "keywords" => ["rdev", "application", "php"]
            ],
            "console" => [
                "title" => "Console",
                "description" => "Learn how to create an RDev console application",
                "keywords" => ["rdev", "console", "command prompt", "php"]
            ],
            "dependency-injection" => [
                "title" => "Dependency Injection",
                "description" => "Learn about dependency injection in RDev",
                "keywords" => ["rdev", "ioc", "dependency injection", "php"]
            ],
            "files" => [
                "title" => "File System",
                "description" => "Learn about working with the file system in RDev",
                "keywords" => ["rdev", "file system", "read write", "php"]
            ],
            "http" => [
                "title" => "HTTP Requests/Responses",
                "description" => "Learn about handling HTTP requests and responses in RDev",
                "keywords" => ["rdev", "http", "requests", "headers", "cookies", "php"]
            ],
            "nosql" => [
                "title" => "NoSQL Databases",
                "description" => "Learn how to interact with NoSQL databases in RDev",
                "keywords" => ["rdev", "nosql", "redis", "memcached", "cache", "php"]
            ],
            "orm" => [
                "title" => "ORM",
                "description" => "Learn about using ORM in RDev",
                "keywords" => ["rdev", "orm", "unit of work", "object relational mapping", "data mapper", "repository", "php"]
            ],
            "query-builders" => [
                "title" => "Query Builders",
                "description" => "Learn about RDev SQL query builders",
                "keywords" => ["rdev", "programmatically build", "queries", "sql", "php"]
            ],
            "rdbms" => [
                "title" => "Relational Databases",
                "description" => "Learn about working with relational databases in RDev",
                "keywords" => ["rdev", "rdbms", "mysql", "postgresql", "pdo", "sql", "database", "php"]
            ],
            "routing" => [
                "title" => "Routing",
                "description" => "Learn about creating an RDev HTTP router",
                "keywords" => ["rdev", "routing", "router", "http", "php"]
            ],
            "type-mappers" => [
                "title" => "Type Mappers",
                "description" => "Learn about casting to and from relational database types",
                "keywords" => ["rdev", "sql", "cast", "type mapping", "php"]
            ],
            "views" => [
                "title" => "Views",
                "description" => "Learn how to create powerful view templates in RDev",
                "keywords" => ["rdev", "views", "template", "php"]
            ]
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