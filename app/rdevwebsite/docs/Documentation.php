<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Pulls in documents
 */
namespace RDevWebsite\Docs;
use Parsedown;
use RDev\Applications\Paths;
use RDev\Files\FileSystem;
use RDev\Files\FileSystemException;

class Documentation
{
    /** The GitHub docs repository */
    const GITHUB_REPOSITORY = "https://github.com/ramblingsofadev/docs.git";
    /** The default branch to show in the docs */
    const DEFAULT_BRANCH = "0.4";
    /** @var array The mapping of documentation branches to data */
    private static $branches = [
        "master" => [
            "title" => "Master",
            "default" => "installing",
            "docs" => [
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
                    ],
                    "application-workflow" => [
                        "title" => "Application Workflow",
                        "description" => "Learn about the workflow of HTTP and console applications in RDev",
                        "keywords" => ["rdev", "http", "console", "workflow", "php"]
                    ],
                    "testing-your-application" => [
                        "title" => "Testing Your Application",
                        "description" => "Learn how to test an RDev application",
                        "keywords" => ["rdev", "testing", "tdd", "phpunit", "php"]
                    ]
                ],
                "Framework" => [
                    "application" => [
                        "title" => "Application",
                        "description" => "Learn about the inner-workings of an RDev application",
                        "keywords" => ["rdev", "application", "php"]
                    ],
                    "bootstrappers" => [
                        "title" => "Bootstrappers",
                        "description" => "Learn how to configure an RDev application",
                        "keywords" => ["rdev", "configuration", "bootstrapper", "php"]
                    ],
                    "console" => [
                        "title" => "Console",
                        "description" => "Learn how to create an RDev console application",
                        "keywords" => ["rdev", "console", "command prompt", "php"]
                    ],
                    "cryptography" => [
                        "title" => "Cryptography",
                        "description" => "Learn how to make your data cryptographically-secure with RDev",
                        "keywords" => ["rdev", "cryptography", "encryption", "security", "passwords", "hashing", "php"]
                    ],
                    "dependency-injection" => [
                        "title" => "Dependency Injection",
                        "description" => "Learn about dependency injection in RDev",
                        "keywords" => ["rdev", "ioc", "dependency injection", "php"]
                    ],
                    "environment-configs" => [
                        "title" => "Environment Configs",
                        "description" => "Learn how to setup environment variables in RDev",
                        "keywords" => ["rdev", "environment variables", "config", "php"]
                    ],
                    "files" => [
                        "title" => "File System",
                        "description" => "Learn about working with the file system in RDev",
                        "keywords" => ["rdev", "file system", "read write", "php"]
                    ],
                    "http-middleware" => [
                        "title" => "HTTP Middleware",
                        "description" => "Learn about HTTP middleware in RDev",
                        "keywords" => ["rdev", "middleware", "http", "requests", "responses", "php"]
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
                    "pipelines" => [
                        "title" => "Pipelines",
                        "description" => "Learn how to pipeline data",
                        "keywords" => ["rdev", "pipeline", "serial", "php"]
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
                    "sessions" => [
                        "title" => "Sessions",
                        "description" => "Learn about sessions in RDev",
                        "keywords" => ["rdev", "sessions", "php"]
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
            ]
        ],
        "0.4" => [
            "title" => "0.4",
            "default" => "installing",
            "docs" => [
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
                    ],
                    "application-workflow" => [
                        "title" => "Application Workflow",
                        "description" => "Learn about the workflow of HTTP and console applications in RDev",
                        "keywords" => ["rdev", "http", "console", "workflow", "php"]
                    ],
                    "testing-your-application" => [
                        "title" => "Testing Your Application",
                        "description" => "Learn how to test an RDev application",
                        "keywords" => ["rdev", "testing", "tdd", "phpunit", "php"]
                    ]
                ],
                "Framework" => [
                    "application" => [
                        "title" => "Application",
                        "description" => "Learn about the inner-workings of an RDev application",
                        "keywords" => ["rdev", "application", "php"]
                    ],
                    "bootstrappers" => [
                        "title" => "Bootstrappers",
                        "description" => "Learn how to configure an RDev application",
                        "keywords" => ["rdev", "configuration", "bootstrapper", "php"]
                    ],
                    "console" => [
                        "title" => "Console",
                        "description" => "Learn how to create an RDev console application",
                        "keywords" => ["rdev", "console", "command prompt", "php"]
                    ],
                    "cryptography" => [
                        "title" => "Cryptography",
                        "description" => "Learn how to make your data cryptographically-secure with RDev",
                        "keywords" => ["rdev", "cryptography", "encryption", "security", "passwords", "hashing", "php"]
                    ],
                    "dependency-injection" => [
                        "title" => "Dependency Injection",
                        "description" => "Learn about dependency injection in RDev",
                        "keywords" => ["rdev", "ioc", "dependency injection", "php"]
                    ],
                    "environment-configs" => [
                        "title" => "Environment Configs",
                        "description" => "Learn how to setup environment variables in RDev",
                        "keywords" => ["rdev", "environment variables", "config", "php"]
                    ],
                    "files" => [
                        "title" => "File System",
                        "description" => "Learn about working with the file system in RDev",
                        "keywords" => ["rdev", "file system", "read write", "php"]
                    ],
                    "http-middleware" => [
                        "title" => "HTTP Middleware",
                        "description" => "Learn about HTTP middleware in RDev",
                        "keywords" => ["rdev", "middleware", "http", "requests", "responses", "php"]
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
                    "pipelines" => [
                        "title" => "Pipelines",
                        "description" => "Learn how to pipeline data",
                        "keywords" => ["rdev", "pipeline", "serial", "php"]
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
            ]
        ]
    ];
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

        foreach(self::$branches as $branchName => $branchData)
        {
            $rawDocsPath = "{$this->paths["tmp"]}/docs/$branchName";
            $compiledDocsPath = "{$this->paths["compiledDocs"]}/$branchName";

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

            if(!$this->files->exists($compiledDocsPath))
            {
                $this->files->makeDirectory($compiledDocsPath);
            }

            $markdownFiles = $this->files->glob("$rawDocsPath/*.md");

            // Convert the Markdown files into HTML and store them in the resources directory
            foreach($markdownFiles as $index => $markdownFile)
            {
                $html = $this->parsedown->text($this->files->read($markdownFile));
                $compiledDocFilename = sprintf(
                    "%s/%s/%s.html",
                    $this->paths['compiledDocs'],
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

        foreach(self::$branches as $name => $data)
        {
            $titles[$name] = $data["title"];
        }

        return $titles;
    }

    /**
     * Gets the parsed document
     *
     * @param string $name The name of the document we want
     * @param string $version The version of RDev we want
     * @return string The parsed document
     * @throws FileSystemException Thrown if no document exists with the input name
     */
    public function getCompiledDoc($name, $version)
    {
        return $this->files->read("{$this->paths["compiledDocs"]}/$version/$name.html");
    }

    /**
     * Gets the name of the default doc for a version
     *
     * @param string $version The version to get
     * @return string The default doc
     */
    public function getDefaultDoc($version)
    {
        return self::$branches[$version]["default"];
    }

    /**
     * Gets the docs for a version
     *
     * @param string $version The version to get
     * @return string The docs
     */
    public function getDocs($version)
    {
        return self::$branches[$version]["docs"];
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

        foreach(self::$branches[$version]["docs"] as $sectionHeader => $docs)
        {
            $flattenedDocs = array_merge($flattenedDocs, $docs);
        }

        return $flattenedDocs;
    }

    /**
     * Gets whether or not a version has docs
     *
     * @param string $version The name of the version to get
     * @return bool True if the version exists, otherwise false
     */
    public function hasVersion($version)
    {
        return isset(self::$branches[$version]);
    }
}