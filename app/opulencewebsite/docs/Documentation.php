<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Pulls in documents
 */
namespace OpulenceWebsite\Docs;
use Parsedown;
use Opulence\Applications\Paths;
use Opulence\Files\FileSystem;
use Opulence\Files\FileSystemException;

class Documentation
{
    /** The GitHub docs repository */
    const GITHUB_REPOSITORY = "https://github.com/opulencephp/docs.git";
    /** The default branch to show in the docs */
    const DEFAULT_BRANCH = "0.6";

    /** @var array The mapping of documentation branches to data */
    private static $branches = [
        "master" => [
            "title" => "Master",
            "default" => "installing",
            "docs" => [
                "Getting Started" => [
                    "installing" => [
                        "title" => "Installing",
                        "linkText" => "Installing",
                        "description" => "Learn how to install Opulence",
                        "keywords" => ["opulence", "install", "php"]
                    ],
                    "directory-structure" => [
                        "title" => "Directory Structure",
                        "linkText" => "Directory Structure",
                        "description" => "Learn about how Opulence is structured",
                        "keywords" => ["opulence", "structure", "php"]
                    ]
                ],
                "HTTP Applications" => [
                    "http-basics" => [
                        "title" => "HTTP Basics",
                        "linkText" => "Basics",
                        "description" => "Learn the basics of HTTP applications in Opulence",
                        "keywords" => ["opulence", "http", "application", "mvc", "controller", "middleware"]
                    ],
                    "http-workflow" => [
                        "title" => "HTTP Application Workflow",
                        "linkText" => "Application Workflow",
                        "description" => "Learn about the workflow of HTTP applications in Opulence",
                        "keywords" => ["opulence", "http", "workflow", "php"]
                    ],
                    "routing" => [
                        "title" => "Routing",
                        "linkText" => "Routing",
                        "description" => "Learn about creating an Opulence HTTP router",
                        "keywords" => ["opulence", "routing", "router", "http", "php"]
                    ],
                    "http-requests-responses" => [
                        "title" => "Requests/Responses",
                        "linkText" => "HTTP Requests/Responses",
                        "description" => "Learn about handling HTTP requests and responses in Opulence",
                        "keywords" => ["opulence", "http", "requests", "headers", "cookies", "php"]
                    ],
                    "sessions" => [
                        "title" => "Sessions",
                        "linkText" => "Sessions",
                        "description" => "Learn about sessions in Opulence",
                        "keywords" => ["opulence", "sessions", "php"]
                    ],
                    "http-middleware" => [
                        "title" => "HTTP Middleware",
                        "linkText" => "Middleware",
                        "description" => "Learn about HTTP middleware in Opulence",
                        "keywords" => ["opulence", "middleware", "http", "requests", "responses", "php"]
                    ],
                    "http-security" => [
                        "title" => "HTTP Security",
                        "linkText" => "Security",
                        "description" => "Learn about security in HTTP applications in Opulence",
                        "keywords" => ["opulence", "security", "http", "css", "xsrf", "csrf", "cross site request forgery", "hack", "php"]
                    ],
                    "http-testing" => [
                        "title" => "Testing Your HTTP Application",
                        "linkText" => "Testing Your Application",
                        "description" => "Learn how to test an Opulence HTTP application",
                        "keywords" => ["opulence", "testing", "tdd", "phpunit", "php"]
                    ]
                ],
                "Console Applications" => [
                    "console-basics" => [
                        "title" => "Console Basics",
                        "linkText" => "Basics",
                        "description" => "Learn the basics of console applications in Opulence",
                        "keywords" => ["opulence", "console", "command prompt", "php"]
                    ],
                    "console-workflow" => [
                        "title" => "Console Application Workflow",
                        "linkText" => "Application Workflow",
                        "description" => "Learn about the workflow of HTTP console in Opulence",
                        "keywords" => ["opulence", "console", "workflow", "php"]
                    ],
                    "console-requests-responses" => [
                        "title" => "Console Requests/Responses",
                        "linkText" => "Requests/Responses",
                        "description" => "Learn about console requests and responses",
                        "keywords" => ["opulence", "console", "requests", "responses", "php"]
                    ],
                    "console-creating-commands" => [
                        "title" => "Creating Commands",
                        "linkText" => "Creating Commands",
                        "description" => "Learn how to create custom console commands in Opulence",
                        "keywords" => ["opulence", "console", "commands", "php"]
                    ],
                    "console-testing" => [
                        "title" => "Testing Your Console Application",
                        "linkText" => "Testing Your Application",
                        "description" => "Learn how to test an Opulence console application",
                        "keywords" => ["opulence", "testing", "tdd", "phpunit", "php"]
                    ]
                ],
                "Views" => [
                    "view-basics" => [
                        "title" => "View Basics",
                        "linkText" => "Basics",
                        "description" => "Learn how to create powerful view templates in Opulence",
                        "keywords" => ["opulence", "views", "template", "php"]
                    ],
                    "view-functions" => [
                        "title" => "View Functions",
                        "linkText" => "Functions",
                        "description" => "Learn how to use and create functions in Opulence templates",
                        "keywords" => ["opulence", "views", "template", "functions", "php"]
                    ],
                    "view-factories" => [
                        "title" => "View Factories",
                        "linkText" => "Factories",
                        "description" => "Learn how factories can be used to build templates",
                        "keywords" => ["opulence", "views", "template", "factories", "php"]
                    ]
                ],
                "Databases" => [
                    "database-basics" => [
                        "title" => "Database Basics",
                        "linkText" => "Basics",
                        "description" => "Learn about working with relational databases in Opulence",
                        "keywords" => ["opulence", "rdbms", "mysql", "postgresql", "pdo", "sql", "database", "php"]
                    ],
                    "database-query-builders" => [
                        "title" => "Query Builders",
                        "linkText" => "Query Builders",
                        "description" => "Learn about Opulence SQL query builders",
                        "keywords" => ["opulence", "programmatically build", "queries", "sql", "php"]
                    ],
                    "database-type-mappers" => [
                        "title" => "Type Mappers",
                        "linkText" => "Type Mappers",
                        "description" => "Learn about casting to and from relational database types",
                        "keywords" => ["opulence", "sql", "cast", "type mapping", "php"]
                    ]
                ],
                "ORM" => [
                    "orm-basics" => [
                        "title" => "ORM Basics",
                        "linkText" => "Basics",
                        "description" => "Learn the basics of ORM in Opulence",
                        "keywords" => ["opulence", "orm", "repository", "data mapper"]
                    ],
                    "orm-repositories" => [
                        "title" => "Repositories",
                        "linkText" => "Repositories",
                        "description" => "Learn about repositories in Opulence",
                        "keywords" => ["opulence", "orm", "repository"]
                    ],
                    "orm-data-mappers" => [
                        "title" => "Data Mappers",
                        "linkText" => "Data Mappers",
                        "description" => "Learn about data mappers in Opulence",
                        "keywords" => ["opulence", "orm", "repository", "data mapper"]
                    ],
                    "orm-units-of-work" => [
                        "title" => "Unit of Work",
                        "linkText" => "Unit of Work",
                        "description" => "Learn about units of work and ORM in Opulence",
                        "keywords" => ["opulence", "orm", "repository", "data mapper", "unit of work", "uow"]
                    ]
                ],
                "Framework" => [
                    "application" => [
                        "title" => "Application",
                        "linkText" => "Application",
                        "description" => "Learn about the inner-workings of an Opulence application",
                        "keywords" => ["opulence", "application", "php"]
                    ],
                    "bootstrappers" => [
                        "title" => "Bootstrappers",
                        "linkText" => "Bootstrappers",
                        "description" => "Learn how to configure an Opulence application",
                        "keywords" => ["opulence", "configuration", "bootstrapper", "php"]
                    ],
                    "cache" => [
                        "title" => "Cache",
                        "linkText" => "Cache",
                        "description" => "Learn how to use cache in an Opulence application",
                        "keywords" => ["opulence", "cache", "Redis", "Memcached", "php"]
                    ],
                    "cryptography" => [
                        "title" => "Cryptography",
                        "linkText" => "Cryptography",
                        "description" => "Learn how to make your data cryptographically-secure with Opulence",
                        "keywords" => ["opulence", "cryptography", "encryption", "security", "passwords", "hashing", "php"]
                    ],
                    "dependency-injection" => [
                        "title" => "Dependency Injection",
                        "linkText" => "Dependency Injection",
                        "description" => "Learn about dependency injection in Opulence",
                        "keywords" => ["opulence", "ioc", "dependency injection", "php"]
                    ],
                    "environments" => [
                        "title" => "Environments",
                        "linkText" => "Environments",
                        "description" => "Learn how to setup environment variables in Opulence",
                        "keywords" => ["opulence", "environment variables", "config", "php"]
                    ],
                    "events" => [
                        "title" => "Events",
                        "linkText" => "Events",
                        "description" => "Learn about events in Opulence",
                        "keywords" => ["opulence", "events", "dispatchers", "php"]
                    ],
                    "files" => [
                        "title" => "File System",
                        "linkText" => "File System",
                        "description" => "Learn about working with the file system in Opulence",
                        "keywords" => ["opulence", "file system", "read write", "php"]
                    ],
                    "nosql" => [
                        "title" => "NoSQL Databases",
                        "linkText" => "NoSQL Databases",
                        "description" => "Learn how to interact with NoSQL databases in Opulence",
                        "keywords" => ["opulence", "nosql", "redis", "memcached", "cache", "php"]
                    ],
                    "pipelines" => [
                        "title" => "Pipelines",
                        "linkText" => "Pipelines",
                        "description" => "Learn how to pipeline data",
                        "keywords" => ["opulence", "pipeline", "serial", "php"]
                    ]
                ]
            ]
        ],
        "0.6" => [
            "title" => "0.6",
            "default" => "installing",
            "docs" => [
                "Getting Started" => [
                    "installing" => [
                        "title" => "Installing",
                        "linkText" => "Installing",
                        "description" => "Learn how to install Opulence",
                        "keywords" => ["opulence", "install", "php"]
                    ],
                    "directory-structure" => [
                        "title" => "Directory Structure",
                        "linkText" => "Directory Structure",
                        "description" => "Learn about how Opulence is structured",
                        "keywords" => ["opulence", "structure", "php"]
                    ]
                ],
                "HTTP Applications" => [
                    "http-basics" => [
                        "title" => "HTTP Basics",
                        "linkText" => "Basics",
                        "description" => "Learn the basics of HTTP applications in Opulence",
                        "keywords" => ["opulence", "http", "application", "mvc", "controller", "middleware"]
                    ],
                    "http-workflow" => [
                        "title" => "HTTP Application Workflow",
                        "linkText" => "Application Workflow",
                        "description" => "Learn about the workflow of HTTP applications in Opulence",
                        "keywords" => ["opulence", "http", "workflow", "php"]
                    ],
                    "routing" => [
                        "title" => "Routing",
                        "linkText" => "Routing",
                        "description" => "Learn about creating an Opulence HTTP router",
                        "keywords" => ["opulence", "routing", "router", "http", "php"]
                    ],
                    "http-requests-responses" => [
                        "title" => "Requests/Responses",
                        "linkText" => "HTTP Requests/Responses",
                        "description" => "Learn about handling HTTP requests and responses in Opulence",
                        "keywords" => ["opulence", "http", "requests", "headers", "cookies", "php"]
                    ],
                    "sessions" => [
                        "title" => "Sessions",
                        "linkText" => "Sessions",
                        "description" => "Learn about sessions in Opulence",
                        "keywords" => ["opulence", "sessions", "php"]
                    ],
                    "http-middleware" => [
                        "title" => "HTTP Middleware",
                        "linkText" => "Middleware",
                        "description" => "Learn about HTTP middleware in Opulence",
                        "keywords" => ["opulence", "middleware", "http", "requests", "responses", "php"]
                    ],
                    "http-security" => [
                        "title" => "HTTP Security",
                        "linkText" => "Security",
                        "description" => "Learn about security in HTTP applications in Opulence",
                        "keywords" => ["opulence", "security", "http", "css", "xsrf", "csrf", "cross site request forgery", "hack", "php"]
                    ],
                    "http-testing" => [
                        "title" => "Testing Your HTTP Application",
                        "linkText" => "Testing Your Application",
                        "description" => "Learn how to test an Opulence HTTP application",
                        "keywords" => ["opulence", "testing", "tdd", "phpunit", "php"]
                    ]
                ],
                "Console Applications" => [
                    "console-basics" => [
                        "title" => "Console Basics",
                        "linkText" => "Basics",
                        "description" => "Learn the basics of console applications in Opulence",
                        "keywords" => ["opulence", "console", "command prompt", "php"]
                    ],
                    "console-workflow" => [
                        "title" => "Console Application Workflow",
                        "linkText" => "Application Workflow",
                        "description" => "Learn about the workflow of HTTP console in Opulence",
                        "keywords" => ["opulence", "console", "workflow", "php"]
                    ],
                    "console-requests-responses" => [
                        "title" => "Console Requests/Responses",
                        "linkText" => "Requests/Responses",
                        "description" => "Learn about console requests and responses",
                        "keywords" => ["opulence", "console", "requests", "responses", "php"]
                    ],
                    "console-creating-commands" => [
                        "title" => "Creating Commands",
                        "linkText" => "Creating Commands",
                        "description" => "Learn how to create custom console commands in Opulence",
                        "keywords" => ["opulence", "console", "commands", "php"]
                    ],
                    "console-testing" => [
                        "title" => "Testing Your Console Application",
                        "linkText" => "Testing Your Application",
                        "description" => "Learn how to test an Opulence console application",
                        "keywords" => ["opulence", "testing", "tdd", "phpunit", "php"]
                    ]
                ],
                "Views" => [
                    "view-basics" => [
                        "title" => "View Basics",
                        "linkText" => "Basics",
                        "description" => "Learn how to create powerful view templates in Opulence",
                        "keywords" => ["opulence", "views", "template", "php"]
                    ],
                    "view-functions" => [
                        "title" => "View Functions",
                        "linkText" => "Functions",
                        "description" => "Learn how to use and create functions in Opulence templates",
                        "keywords" => ["opulence", "views", "template", "functions", "php"]
                    ],
                    "view-factories" => [
                        "title" => "View Factories",
                        "linkText" => "Factories",
                        "description" => "Learn how factories can be used to build templates",
                        "keywords" => ["opulence", "views", "template", "factories", "php"]
                    ]
                ],
                "Databases" => [
                    "database-basics" => [
                        "title" => "Database Basics",
                        "linkText" => "Basics",
                        "description" => "Learn about working with relational databases in Opulence",
                        "keywords" => ["opulence", "rdbms", "mysql", "postgresql", "pdo", "sql", "database", "php"]
                    ],
                    "database-query-builders" => [
                        "title" => "Query Builders",
                        "linkText" => "Query Builders",
                        "description" => "Learn about Opulence SQL query builders",
                        "keywords" => ["opulence", "programmatically build", "queries", "sql", "php"]
                    ],
                    "database-type-mappers" => [
                        "title" => "Type Mappers",
                        "linkText" => "Type Mappers",
                        "description" => "Learn about casting to and from relational database types",
                        "keywords" => ["opulence", "sql", "cast", "type mapping", "php"]
                    ]
                ],
                "ORM" => [
                    "orm-basics" => [
                        "title" => "ORM Basics",
                        "linkText" => "Basics",
                        "description" => "Learn the basics of ORM in Opulence",
                        "keywords" => ["opulence", "orm", "repository", "data mapper"]
                    ],
                    "orm-repositories" => [
                        "title" => "Repositories",
                        "linkText" => "Repositories",
                        "description" => "Learn about repositories in Opulence",
                        "keywords" => ["opulence", "orm", "repository"]
                    ],
                    "orm-data-mappers" => [
                        "title" => "Data Mappers",
                        "linkText" => "Data Mappers",
                        "description" => "Learn about data mappers in Opulence",
                        "keywords" => ["opulence", "orm", "repository", "data mapper"]
                    ],
                    "orm-units-of-work" => [
                        "title" => "Unit of Work",
                        "linkText" => "Unit of Work",
                        "description" => "Learn about units of work and ORM in Opulence",
                        "keywords" => ["opulence", "orm", "repository", "data mapper", "unit of work", "uow"]
                    ]
                ],
                "Framework" => [
                    "application" => [
                        "title" => "Application",
                        "linkText" => "Application",
                        "description" => "Learn about the inner-workings of an Opulence application",
                        "keywords" => ["opulence", "application", "php"]
                    ],
                    "bootstrappers" => [
                        "title" => "Bootstrappers",
                        "linkText" => "Bootstrappers",
                        "description" => "Learn how to configure an Opulence application",
                        "keywords" => ["opulence", "configuration", "bootstrapper", "php"]
                    ],
                    "cache" => [
                        "title" => "Cache",
                        "linkText" => "Cache",
                        "description" => "Learn how to use cache in an Opulence application",
                        "keywords" => ["opulence", "cache", "Redis", "Memcached", "php"]
                    ],
                    "cryptography" => [
                        "title" => "Cryptography",
                        "linkText" => "Cryptography",
                        "description" => "Learn how to make your data cryptographically-secure with Opulence",
                        "keywords" => ["opulence", "cryptography", "encryption", "security", "passwords", "hashing", "php"]
                    ],
                    "dependency-injection" => [
                        "title" => "Dependency Injection",
                        "linkText" => "Dependency Injection",
                        "description" => "Learn about dependency injection in Opulence",
                        "keywords" => ["opulence", "ioc", "dependency injection", "php"]
                    ],
                    "environments" => [
                        "title" => "Environments",
                        "linkText" => "Environments",
                        "description" => "Learn how to setup environment variables in Opulence",
                        "keywords" => ["opulence", "environment variables", "config", "php"]
                    ],
                    "events" => [
                        "title" => "Events",
                        "linkText" => "Events",
                        "description" => "Learn about events in Opulence",
                        "keywords" => ["opulence", "events", "dispatchers", "php"]
                    ],
                    "files" => [
                        "title" => "File System",
                        "linkText" => "File System",
                        "description" => "Learn about working with the file system in Opulence",
                        "keywords" => ["opulence", "file system", "read write", "php"]
                    ],
                    "nosql" => [
                        "title" => "NoSQL Databases",
                        "linkText" => "NoSQL Databases",
                        "description" => "Learn how to interact with NoSQL databases in Opulence",
                        "keywords" => ["opulence", "nosql", "redis", "memcached", "cache", "php"]
                    ],
                    "pipelines" => [
                        "title" => "Pipelines",
                        "linkText" => "Pipelines",
                        "description" => "Learn how to pipeline data",
                        "keywords" => ["opulence", "pipeline", "serial", "php"]
                    ]
                ]
            ]
        ],
        "0.5" => [
            "title" => "0.5",
            "default" => "installing",
            "docs" => [
                "Getting Started" => [
                    "installing" => [
                        "title" => "Installing",
                        "linkText" => "Installing",
                        "description" => "Learn how to install Opulence",
                        "keywords" => ["opulence", "install", "php"]
                    ],
                    "directory-structure" => [
                        "title" => "Directory Structure",
                        "linkText" => "Directory Structure",
                        "description" => "Learn about how Opulence is structured",
                        "keywords" => ["opulence", "structure", "php"]
                    ]
                ],
                "HTTP Applications" => [
                    "http-basics" => [
                        "title" => "HTTP Basics",
                        "linkText" => "Basics",
                        "description" => "Learn the basics of HTTP applications in Opulence",
                        "keywords" => ["opulence", "http", "application", "mvc", "controller", "middleware"]
                    ],
                    "http-workflow" => [
                        "title" => "HTTP Application Workflow",
                        "linkText" => "Application Workflow",
                        "description" => "Learn about the workflow of HTTP applications in Opulence",
                        "keywords" => ["opulence", "http", "workflow", "php"]
                    ],
                    "routing" => [
                        "title" => "Routing",
                        "linkText" => "Routing",
                        "description" => "Learn about creating an Opulence HTTP router",
                        "keywords" => ["opulence", "routing", "router", "http", "php"]
                    ],
                    "http-requests-responses" => [
                        "title" => "Requests/Responses",
                        "linkText" => "HTTP Requests/Responses",
                        "description" => "Learn about handling HTTP requests and responses in Opulence",
                        "keywords" => ["opulence", "http", "requests", "headers", "cookies", "php"]
                    ],
                    "sessions" => [
                        "title" => "Sessions",
                        "linkText" => "Sessions",
                        "description" => "Learn about sessions in Opulence",
                        "keywords" => ["opulence", "sessions", "php"]
                    ],
                    "http-middleware" => [
                        "title" => "HTTP Middleware",
                        "linkText" => "Middleware",
                        "description" => "Learn about HTTP middleware in Opulence",
                        "keywords" => ["opulence", "middleware", "http", "requests", "responses", "php"]
                    ],
                    "http-security" => [
                        "title" => "HTTP Security",
                        "linkText" => "Security",
                        "description" => "Learn about security in HTTP applications in Opulence",
                        "keywords" => ["opulence", "security", "http", "css", "xsrf", "csrf", "cross site request forgery", "hack", "php"]
                    ],
                    "http-testing" => [
                        "title" => "Testing Your HTTP Application",
                        "linkText" => "Testing Your Application",
                        "description" => "Learn how to test an Opulence HTTP application",
                        "keywords" => ["opulence", "testing", "tdd", "phpunit", "php"]
                    ]
                ],
                "Console Applications" => [
                    "console-basics" => [
                        "title" => "Console Basics",
                        "linkText" => "Basics",
                        "description" => "Learn the basics of console applications in Opulence",
                        "keywords" => ["opulence", "console", "command prompt", "php"]
                    ],
                    "console-workflow" => [
                        "title" => "Console Application Workflow",
                        "linkText" => "Application Workflow",
                        "description" => "Learn about the workflow of HTTP console in Opulence",
                        "keywords" => ["opulence", "console", "workflow", "php"]
                    ],
                    "console-requests-responses" => [
                        "title" => "Console Requests/Responses",
                        "linkText" => "Requests/Responses",
                        "description" => "Learn about console requests and responses",
                        "keywords" => ["opulence", "console", "requests", "responses", "php"]
                    ],
                    "console-creating-commands" => [
                        "title" => "Creating Commands",
                        "linkText" => "Creating Commands",
                        "description" => "Learn how to create custom console commands in Opulence",
                        "keywords" => ["opulence", "console", "commands", "php"]
                    ],
                    "console-testing" => [
                        "title" => "Testing Your Console Application",
                        "linkText" => "Testing Your Application",
                        "description" => "Learn how to test an Opulence console application",
                        "keywords" => ["opulence", "testing", "tdd", "phpunit", "php"]
                    ]
                ],
                "Views" => [
                    "view-basics" => [
                        "title" => "View Basics",
                        "linkText" => "Basics",
                        "description" => "Learn how to create powerful view templates in Opulence",
                        "keywords" => ["opulence", "views", "template", "php"]
                    ],
                    "view-functions" => [
                        "title" => "View Functions",
                        "linkText" => "Functions",
                        "description" => "Learn how to use and create functions in Opulence templates",
                        "keywords" => ["opulence", "views", "template", "functions", "php"]
                    ],
                    "view-factories" => [
                        "title" => "View Factories",
                        "linkText" => "Factories",
                        "description" => "Learn how factories can be used to build templates",
                        "keywords" => ["opulence", "views", "template", "factories", "php"]
                    ]
                ],
                "Databases" => [
                    "database-basics" => [
                        "title" => "Database Basics",
                        "linkText" => "Basics",
                        "description" => "Learn about working with relational databases in Opulence",
                        "keywords" => ["opulence", "rdbms", "mysql", "postgresql", "pdo", "sql", "database", "php"]
                    ],
                    "database-query-builders" => [
                        "title" => "Query Builders",
                        "linkText" => "Query Builders",
                        "description" => "Learn about Opulence SQL query builders",
                        "keywords" => ["opulence", "programmatically build", "queries", "sql", "php"]
                    ],
                    "database-type-mappers" => [
                        "title" => "Type Mappers",
                        "linkText" => "Type Mappers",
                        "description" => "Learn about casting to and from relational database types",
                        "keywords" => ["opulence", "sql", "cast", "type mapping", "php"]
                    ]
                ],
                "ORM" => [
                    "orm-basics" => [
                        "title" => "ORM Basics",
                        "linkText" => "Basics",
                        "description" => "Learn the basics of ORM in Opulence",
                        "keywords" => ["opulence", "orm", "repository", "data mapper"]
                    ],
                    "orm-repositories" => [
                        "title" => "Repositories",
                        "linkText" => "Repositories",
                        "description" => "Learn about repositories in Opulence",
                        "keywords" => ["opulence", "orm", "repository"]
                    ],
                    "orm-data-mappers" => [
                        "title" => "Data Mappers",
                        "linkText" => "Data Mappers",
                        "description" => "Learn about data mappers in Opulence",
                        "keywords" => ["opulence", "orm", "repository", "data mapper"]
                    ],
                    "orm-units-of-work" => [
                        "title" => "Unit of Work",
                        "linkText" => "Unit of Work",
                        "description" => "Learn about units of work and ORM in Opulence",
                        "keywords" => ["opulence", "orm", "repository", "data mapper", "unit of work", "uow"]
                    ]
                ],
                "Framework" => [
                    "application" => [
                        "title" => "Application",
                        "linkText" => "Application",
                        "description" => "Learn about the inner-workings of an Opulence application",
                        "keywords" => ["opulence", "application", "php"]
                    ],
                    "bootstrappers" => [
                        "title" => "Bootstrappers",
                        "linkText" => "Bootstrappers",
                        "description" => "Learn how to configure an Opulence application",
                        "keywords" => ["opulence", "configuration", "bootstrapper", "php"]
                    ],
                    "cache" => [
                        "title" => "Cache",
                        "linkText" => "Cache",
                        "description" => "Learn how to use cache in an Opulence application",
                        "keywords" => ["opulence", "cache", "Redis", "Memcached", "php"]
                    ],
                    "cryptography" => [
                        "title" => "Cryptography",
                        "linkText" => "Cryptography",
                        "description" => "Learn how to make your data cryptographically-secure with Opulence",
                        "keywords" => ["opulence", "cryptography", "encryption", "security", "passwords", "hashing", "php"]
                    ],
                    "dependency-injection" => [
                        "title" => "Dependency Injection",
                        "linkText" => "Dependency Injection",
                        "description" => "Learn about dependency injection in Opulence",
                        "keywords" => ["opulence", "ioc", "dependency injection", "php"]
                    ],
                    "environments" => [
                        "title" => "Environments",
                        "linkText" => "Environments",
                        "description" => "Learn how to setup environment variables in Opulence",
                        "keywords" => ["opulence", "environment variables", "config", "php"]
                    ],
                    "events" => [
                        "title" => "Events",
                        "linkText" => "Events",
                        "description" => "Learn about events in Opulence",
                        "keywords" => ["opulence", "events", "dispatchers", "php"]
                    ],
                    "files" => [
                        "title" => "File System",
                        "linkText" => "File System",
                        "description" => "Learn about working with the file system in Opulence",
                        "keywords" => ["opulence", "file system", "read write", "php"]
                    ],
                    "nosql" => [
                        "title" => "NoSQL Databases",
                        "linkText" => "NoSQL Databases",
                        "description" => "Learn how to interact with NoSQL databases in Opulence",
                        "keywords" => ["opulence", "nosql", "redis", "memcached", "cache", "php"]
                    ],
                    "pipelines" => [
                        "title" => "Pipelines",
                        "linkText" => "Pipelines",
                        "description" => "Learn how to pipeline data",
                        "keywords" => ["opulence", "pipeline", "serial", "php"]
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
     * Gets whether or not a doc exists for a specific version
     *
     * @param string $version The name of the version to get
     * @param string $name The name of the document
     * @return bool True if the document exists, otherwise false
     */
    public function hasDoc($version, $name)
    {
        if(!isset(self::$branches[$version]))
        {
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
        return isset(self::$branches[$version]);
    }
}