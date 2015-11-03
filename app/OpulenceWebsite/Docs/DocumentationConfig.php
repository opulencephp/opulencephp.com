<?php
/**
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2015 David Young
 * @license   https://github.com/opulencephp/Opulence/blob/master/LICENSE.md
 */
namespace OpulenceWebsite\Docs;

/**
 * Defines the documentation config
 */
class DocumentationConfig
{
    /** @var array The mapping of documentation branches to data */
    public static $config = [
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
                    ],
                    "contributing" => [
                        "title" => "Contributing",
                        "linkText" => "Contributing",
                        "description" => "Learn how to contribute to Opulence",
                        "keywords" => ["opulence", "contribute", "open source"]
                    ]
                ],
                "Http Applications" => [
                    "http-basics" => [
                        "title" => "Http Basics",
                        "linkText" => "Basics",
                        "description" => "Learn the basics of Http applications in Opulence",
                        "keywords" => ["opulence", "http", "application", "mvc", "controller", "middleware"]
                    ],
                    "http-workflow" => [
                        "title" => "Http Application Workflow",
                        "linkText" => "Application Workflow",
                        "description" => "Learn about the workflow of Http applications in Opulence",
                        "keywords" => ["opulence", "http", "workflow", "php"]
                    ],
                    "routing" => [
                        "title" => "Routing",
                        "linkText" => "Routing",
                        "description" => "Learn about creating an Opulence Http router",
                        "keywords" => ["opulence", "routing", "router", "http", "php"]
                    ],
                    "http-requests-responses" => [
                        "title" => "Requests/Responses",
                        "linkText" => "Requests/Responses",
                        "description" => "Learn about handling Http requests and responses in Opulence",
                        "keywords" => ["opulence", "http", "requests", "headers", "cookies", "php"]
                    ],
                    "sessions" => [
                        "title" => "Sessions",
                        "linkText" => "Sessions",
                        "description" => "Learn about sessions in Opulence",
                        "keywords" => ["opulence", "sessions", "php"]
                    ],
                    "http-middleware" => [
                        "title" => "Http Middleware",
                        "linkText" => "Middleware",
                        "description" => "Learn about Http middleware in Opulence",
                        "keywords" => ["opulence", "middleware", "http", "requests", "responses", "php"]
                    ],
                    "http-security" => [
                        "title" => "Http Security",
                        "linkText" => "Security",
                        "description" => "Learn about security in Http applications in Opulence",
                        "keywords" => [
                            "opulence",
                            "security",
                            "http",
                            "css",
                            "xsrf",
                            "csrf",
                            "cross site request forgery",
                            "hack",
                            "php"
                        ]
                    ],
                    "http-testing" => [
                        "title" => "Testing Your Http Application",
                        "linkText" => "Testing Your Application",
                        "description" => "Learn how to test an Opulence Http application",
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
                        "description" => "Learn about the workflow of Http console in Opulence",
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
                        "description" => "Learn how to build templates in Opulence",
                        "keywords" => ["opulence", "views", "template", "fortune", "php"]
                    ],
                    "view-fortune" => [
                        "title" => "Fortune",
                        "linkText" => "Fortune",
                        "description" => "Learn how Fortune can build powerful page templates",
                        "keywords" => ["opulence", "fortune", "views", "template", "php"]
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
                        "keywords" => [
                            "opulence",
                            "cryptography",
                            "encryption",
                            "security",
                            "passwords",
                            "hashing",
                            "php"
                        ]
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
                    "memcached" => [
                        "title" => "Memcached",
                        "linkText" => "Memcached",
                        "description" => "Learn how to interact with Memcached databases in Opulence",
                        "keywords" => ["opulence", "nosql", "memcached", "cache", "php"]
                    ],
                    "pipelines" => [
                        "title" => "Pipelines",
                        "linkText" => "Pipelines",
                        "description" => "Learn how to pipeline data",
                        "keywords" => ["opulence", "pipeline", "serial", "php"]
                    ],
                    "redis" => [
                        "title" => "Redis",
                        "linkText" => "Redis",
                        "description" => "Learn how to interact with Redis databases in Opulence",
                        "keywords" => ["opulence", "nosql", "redis", "cache", "php"]
                    ]
                ]
            ]
        ],
        "1.0" => [
            "title" => "1.0",
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
                    ],
                    "contributing" => [
                        "title" => "Contributing",
                        "linkText" => "Contributing",
                        "description" => "Learn how to contribute to Opulence",
                        "keywords" => ["opulence", "contribute", "open source"]
                    ]
                ],
                "Http Applications" => [
                    "http-basics" => [
                        "title" => "Http Basics",
                        "linkText" => "Basics",
                        "description" => "Learn the basics of Http applications in Opulence",
                        "keywords" => ["opulence", "http", "application", "mvc", "controller", "middleware"]
                    ],
                    "http-workflow" => [
                        "title" => "Http Application Workflow",
                        "linkText" => "Application Workflow",
                        "description" => "Learn about the workflow of Http applications in Opulence",
                        "keywords" => ["opulence", "http", "workflow", "php"]
                    ],
                    "routing" => [
                        "title" => "Routing",
                        "linkText" => "Routing",
                        "description" => "Learn about creating an Opulence Http router",
                        "keywords" => ["opulence", "routing", "router", "http", "php"]
                    ],
                    "http-requests-responses" => [
                        "title" => "Http Requests/Responses",
                        "linkText" => "Requests/Responses",
                        "description" => "Learn about handling Http requests and responses in Opulence",
                        "keywords" => ["opulence", "http", "requests", "headers", "cookies", "php"]
                    ],
                    "sessions" => [
                        "title" => "Sessions",
                        "linkText" => "Sessions",
                        "description" => "Learn about sessions in Opulence",
                        "keywords" => ["opulence", "sessions", "php"]
                    ],
                    "http-middleware" => [
                        "title" => "Http Middleware",
                        "linkText" => "Middleware",
                        "description" => "Learn about Http middleware in Opulence",
                        "keywords" => ["opulence", "middleware", "http", "requests", "responses", "php"]
                    ],
                    "http-security" => [
                        "title" => "Http Security",
                        "linkText" => "Security",
                        "description" => "Learn about security in Http applications in Opulence",
                        "keywords" => [
                            "opulence",
                            "security",
                            "http",
                            "css",
                            "xsrf",
                            "csrf",
                            "cross site request forgery",
                            "hack",
                            "php"
                        ]
                    ],
                    "http-testing" => [
                        "title" => "Testing Your Http Application",
                        "linkText" => "Testing Your Application",
                        "description" => "Learn how to test an Opulence Http application",
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
                        "description" => "Learn about the workflow of Http console in Opulence",
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
                        "description" => "Learn how to build templates in Opulence",
                        "keywords" => ["opulence", "views", "template", "fortune", "php"]
                    ],
                    "view-fortune" => [
                        "title" => "Fortune",
                        "linkText" => "Fortune",
                        "description" => "Learn how Fortune can build powerful page templates",
                        "keywords" => ["opulence", "fortune", "views", "template", "php"]
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
                        "keywords" => [
                            "opulence",
                            "cryptography",
                            "encryption",
                            "security",
                            "passwords",
                            "hashing",
                            "php"
                        ]
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
                    "memcached" => [
                        "title" => "Memcached",
                        "linkText" => "Memcached",
                        "description" => "Learn how to interact with Memcached databases in Opulence",
                        "keywords" => ["opulence", "nosql", "memcached", "cache", "php"]
                    ],
                    "pipelines" => [
                        "title" => "Pipelines",
                        "linkText" => "Pipelines",
                        "description" => "Learn how to pipeline data",
                        "keywords" => ["opulence", "pipeline", "serial", "php"]
                    ],
                    "redis" => [
                        "title" => "Redis",
                        "linkText" => "Redis",
                        "description" => "Learn how to interact with Redis databases in Opulence",
                        "keywords" => ["opulence", "nosql", "redis", "cache", "php"]
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
                    ],
                    "contributing" => [
                        "title" => "Contributing",
                        "linkText" => "Contributing",
                        "description" => "Learn how to contribute to Opulence",
                        "keywords" => ["opulence", "contribute", "open source"]
                    ]
                ],
                "Http Applications" => [
                    "http-basics" => [
                        "title" => "Http Basics",
                        "linkText" => "Basics",
                        "description" => "Learn the basics of Http applications in Opulence",
                        "keywords" => ["opulence", "http", "application", "mvc", "controller", "middleware"]
                    ],
                    "http-workflow" => [
                        "title" => "Http Application Workflow",
                        "linkText" => "Application Workflow",
                        "description" => "Learn about the workflow of Http applications in Opulence",
                        "keywords" => ["opulence", "http", "workflow", "php"]
                    ],
                    "routing" => [
                        "title" => "Routing",
                        "linkText" => "Routing",
                        "description" => "Learn about creating an Opulence Http router",
                        "keywords" => ["opulence", "routing", "router", "http", "php"]
                    ],
                    "http-requests-responses" => [
                        "title" => "Http Requests/Responses",
                        "linkText" => "Requests/Responses",
                        "description" => "Learn about handling Http requests and responses in Opulence",
                        "keywords" => ["opulence", "http", "requests", "headers", "cookies", "php"]
                    ],
                    "sessions" => [
                        "title" => "Sessions",
                        "linkText" => "Sessions",
                        "description" => "Learn about sessions in Opulence",
                        "keywords" => ["opulence", "sessions", "php"]
                    ],
                    "http-middleware" => [
                        "title" => "Http Middleware",
                        "linkText" => "Middleware",
                        "description" => "Learn about Http middleware in Opulence",
                        "keywords" => ["opulence", "middleware", "http", "requests", "responses", "php"]
                    ],
                    "http-security" => [
                        "title" => "Http Security",
                        "linkText" => "Security",
                        "description" => "Learn about security in Http applications in Opulence",
                        "keywords" => [
                            "opulence",
                            "security",
                            "http",
                            "css",
                            "xsrf",
                            "csrf",
                            "cross site request forgery",
                            "hack",
                            "php"
                        ]
                    ],
                    "http-testing" => [
                        "title" => "Testing Your Http Application",
                        "linkText" => "Testing Your Application",
                        "description" => "Learn how to test an Opulence Http application",
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
                        "description" => "Learn about the workflow of Http console in Opulence",
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
                        "description" => "Learn how to build templates in Opulence",
                        "keywords" => ["opulence", "views", "template", "fortune", "php"]
                    ],
                    "view-fortune" => [
                        "title" => "Fortune",
                        "linkText" => "Fortune",
                        "description" => "Learn how Fortune can build powerful page templates",
                        "keywords" => ["opulence", "fortune", "views", "template", "php"]
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
                        "keywords" => [
                            "opulence",
                            "cryptography",
                            "encryption",
                            "security",
                            "passwords",
                            "hashing",
                            "php"
                        ]
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
                    "memcached" => [
                        "title" => "Memcached",
                        "linkText" => "Memcached",
                        "description" => "Learn how to interact with Memcached databases in Opulence",
                        "keywords" => ["opulence", "nosql", "memcached", "cache", "php"]
                    ],
                    "pipelines" => [
                        "title" => "Pipelines",
                        "linkText" => "Pipelines",
                        "description" => "Learn how to pipeline data",
                        "keywords" => ["opulence", "pipeline", "serial", "php"]
                    ],
                    "redis" => [
                        "title" => "Redis",
                        "linkText" => "Redis",
                        "description" => "Learn how to interact with Redis databases in Opulence",
                        "keywords" => ["opulence", "nosql", "redis", "cache", "php"]
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
                "Http Applications" => [
                    "http-basics" => [
                        "title" => "Http Basics",
                        "linkText" => "Basics",
                        "description" => "Learn the basics of Http applications in Opulence",
                        "keywords" => ["opulence", "http", "application", "mvc", "controller", "middleware"]
                    ],
                    "http-workflow" => [
                        "title" => "Http Application Workflow",
                        "linkText" => "Application Workflow",
                        "description" => "Learn about the workflow of Http applications in Opulence",
                        "keywords" => ["opulence", "http", "workflow", "php"]
                    ],
                    "routing" => [
                        "title" => "Routing",
                        "linkText" => "Routing",
                        "description" => "Learn about creating an Opulence Http router",
                        "keywords" => ["opulence", "routing", "router", "http", "php"]
                    ],
                    "http-requests-responses" => [
                        "title" => "Http Requests/Responses",
                        "linkText" => "Requests/Responses",
                        "description" => "Learn about handling Http requests and responses in Opulence",
                        "keywords" => ["opulence", "http", "requests", "headers", "cookies", "php"]
                    ],
                    "sessions" => [
                        "title" => "Sessions",
                        "linkText" => "Sessions",
                        "description" => "Learn about sessions in Opulence",
                        "keywords" => ["opulence", "sessions", "php"]
                    ],
                    "http-middleware" => [
                        "title" => "Http Middleware",
                        "linkText" => "Middleware",
                        "description" => "Learn about Http middleware in Opulence",
                        "keywords" => ["opulence", "middleware", "http", "requests", "responses", "php"]
                    ],
                    "http-security" => [
                        "title" => "Http Security",
                        "linkText" => "Security",
                        "description" => "Learn about security in Http applications in Opulence",
                        "keywords" => [
                            "opulence",
                            "security",
                            "http",
                            "css",
                            "xsrf",
                            "csrf",
                            "cross site request forgery",
                            "hack",
                            "php"
                        ]
                    ],
                    "http-testing" => [
                        "title" => "Testing Your Http Application",
                        "linkText" => "Testing Your Application",
                        "description" => "Learn how to test an Opulence Http application",
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
                        "description" => "Learn about the workflow of Http console in Opulence",
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
                        "keywords" => [
                            "opulence",
                            "cryptography",
                            "encryption",
                            "security",
                            "passwords",
                            "hashing",
                            "php"
                        ]
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
}