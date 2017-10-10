<?php

/*
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2017 David Young
 * @license   https://github.com/opulencephp/Opulence/blob/master/LICENSE.md
 */

/**
 * ----------------------------------------------------------
 * Define the documentation config
 * ----------------------------------------------------------
 */
$config = [];
$config['master'] = [
    'title' => 'Master',
    'default' => 'installing',
    'docs' => [
        'Getting Started' => [
            'installing' => [
                'title' => 'Installing',
                'linkText' => 'Installing',
                'description' => 'Learn how to install Opulence',
                'keywords' => ['opulence', 'install', 'php']
            ],
            'upgrading' => [
                'title' => 'Upgrading',
                'linkText' => 'Upgrading',
                'description' => 'Learn how to upgrade Opulence to the latest version',
                'keywords' => ['opulence', 'upgrade', 'update', 'php']
            ],
            'directory-structure' => [
                'title' => 'Directory Structure',
                'linkText' => 'Directory Structure',
                'description' => 'Learn about how Opulence is structured',
                'keywords' => ['opulence', 'structure', 'php']
            ],
            'contributing' => [
                'title' => 'Contributing',
                'linkText' => 'Contributing',
                'description' => 'Learn how to contribute to Opulence',
                'keywords' => ['opulence', 'contribute', 'open source']
            ]
        ],
        'HTTP Applications' => [
            'http-basics' => [
                'title' => 'HTTP Basics',
                'linkText' => 'Basics',
                'description' => 'Learn the basics of HTTP applications in Opulence',
                'keywords' => ['opulence', 'http', 'application', 'mvc', 'controller', 'middleware']
            ],
            'http-workflow' => [
                'title' => 'HTTP Application Workflow',
                'linkText' => 'Application Workflow',
                'description' => 'Learn about the workflow of HTTP applications in Opulence',
                'keywords' => ['opulence', 'http', 'workflow', 'php']
            ],
            'routing' => [
                'title' => 'Routing',
                'linkText' => 'Routing',
                'description' => 'Learn about creating an Opulence HTTP router',
                'keywords' => ['opulence', 'routing', 'router', 'http', 'php']
            ],
            'http-requests-responses' => [
                'title' => 'Requests/Responses',
                'linkText' => 'Requests/Responses',
                'description' => 'Learn about handling HTTP requests and responses in Opulence',
                'keywords' => ['opulence', 'http', 'requests', 'headers', 'cookies', 'php']
            ],
            'sessions' => [
                'title' => 'Sessions',
                'linkText' => 'Sessions',
                'description' => 'Learn about sessions in Opulence',
                'keywords' => ['opulence', 'sessions', 'php']
            ],
            'http-middleware' => [
                'title' => 'HTTP Middleware',
                'linkText' => 'Middleware',
                'description' => 'Learn about HTTP middleware in Opulence',
                'keywords' => ['opulence', 'middleware', 'http', 'requests', 'responses', 'php']
            ],
            'http-security' => [
                'title' => 'HTTP Security',
                'linkText' => 'Security',
                'description' => 'Learn about security in HTTP applications in Opulence',
                'keywords' => [
                    'opulence',
                    'security',
                    'http',
                    'css',
                    'xsrf',
                    'csrf',
                    'cross site request forgery',
                    'hack',
                    'php'
                ]
            ],
            'http-testing' => [
                'title' => 'Testing Your HTTP Application',
                'linkText' => 'Testing Your Application',
                'description' => 'Learn how to test an Opulence HTTP application',
                'keywords' => ['opulence', 'testing', 'tdd', 'phpunit', 'php']
            ]
        ],
        'Console Applications' => [
            'console-basics' => [
                'title' => 'Console Basics',
                'linkText' => 'Basics',
                'description' => 'Learn the basics of console applications in Opulence',
                'keywords' => ['opulence', 'console', 'command prompt', 'php']
            ],
            'console-workflow' => [
                'title' => 'Console Application Workflow',
                'linkText' => 'Application Workflow',
                'description' => 'Learn about the workflow of HTTP console in Opulence',
                'keywords' => ['opulence', 'console', 'workflow', 'php']
            ],
            'console-requests-responses' => [
                'title' => 'Console Requests/Responses',
                'linkText' => 'Requests/Responses',
                'description' => 'Learn about console requests and responses',
                'keywords' => ['opulence', 'console', 'requests', 'responses', 'php']
            ],
            'console-creating-commands' => [
                'title' => 'Creating Commands',
                'linkText' => 'Creating Commands',
                'description' => 'Learn how to create custom console commands in Opulence',
                'keywords' => ['opulence', 'console', 'commands', 'php']
            ],
            'console-testing' => [
                'title' => 'Testing Your Console Application',
                'linkText' => 'Testing Your Application',
                'description' => 'Learn how to test an Opulence console application',
                'keywords' => ['opulence', 'testing', 'tdd', 'phpunit', 'php']
            ]
        ],
        'Views' => [
            'view-basics' => [
                'title' => 'View Basics',
                'linkText' => 'Basics',
                'description' => 'Learn how to build templates in Opulence',
                'keywords' => ['opulence', 'views', 'template', 'fortune', 'php']
            ],
            'view-fortune' => [
                'title' => 'Fortune',
                'linkText' => 'Fortune',
                'description' => 'Learn how Fortune can build powerful page templates',
                'keywords' => ['opulence', 'fortune', 'views', 'template', 'php']
            ]
        ],
        'Databases' => [
            'database-basics' => [
                'title' => 'Database Basics',
                'linkText' => 'Basics',
                'description' => 'Learn about working with relational databases in Opulence',
                'keywords' => ['opulence', 'rdbms', 'mysql', 'postgresql', 'pdo', 'sql', 'database', 'php']
            ],
            'database-query-builders' => [
                'title' => 'Query Builders',
                'linkText' => 'Query Builders',
                'description' => 'Learn about Opulence SQL query builders',
                'keywords' => ['opulence', 'programmatically build', 'queries', 'sql', 'php']
            ],
            'database-type-mappers' => [
                'title' => 'Type Mappers',
                'linkText' => 'Type Mappers',
                'description' => 'Learn about casting to and from relational database types',
                'keywords' => ['opulence', 'sql', 'cast', 'type mapping', 'php']
            ]
        ],
        'ORM' => [
            'orm-basics' => [
                'title' => 'ORM Basics',
                'linkText' => 'Basics',
                'description' => 'Learn the basics of ORM in Opulence',
                'keywords' => ['opulence', 'orm', 'repository', 'data mapper']
            ],
            'orm-repositories' => [
                'title' => 'Repositories',
                'linkText' => 'Repositories',
                'description' => 'Learn about repositories in Opulence',
                'keywords' => ['opulence', 'orm', 'repository']
            ],
            'orm-data-mappers' => [
                'title' => 'Data Mappers',
                'linkText' => 'Data Mappers',
                'description' => 'Learn about data mappers in Opulence',
                'keywords' => ['opulence', 'orm', 'repository', 'data mapper']
            ],
            'orm-units-of-work' => [
                'title' => 'Unit of Work',
                'linkText' => 'Unit of Work',
                'description' => 'Learn about units of work and ORM in Opulence',
                'keywords' => ['opulence', 'orm', 'repository', 'data mapper', 'unit of work', 'uow']
            ]
        ],
        'Framework' => [
            'application' => [
                'title' => 'Applications',
                'linkText' => 'Applications',
                'description' => 'Learn about the inner-workings of an Opulence application',
                'keywords' => ['opulence', 'application', 'php']
            ],
            'authentication' => [
                'title' => 'Authentication',
                'linkText' => 'Authentication',
                'description' => 'Learn about authentication in Opulence',
                'keywords' => ['opulence', 'authentication', 'users']
            ],
            'authorization' => [
                'title' => 'Authorization',
                'linkText' => 'Authorization',
                'description' => 'Learn about authorization in Opulence',
                'keywords' => ['opulence', 'authorization', 'users']
            ],
            'bootstrappers' => [
                'title' => 'Bootstrappers',
                'linkText' => 'Bootstrappers',
                'description' => 'Learn how to configure an Opulence application',
                'keywords' => ['opulence', 'configuration', 'bootstrapper', 'php']
            ],
            'cache' => [
                'title' => 'Cache',
                'linkText' => 'Cache',
                'description' => 'Learn how to use cache in an Opulence application',
                'keywords' => ['opulence', 'cache', 'Redis', 'Memcached', 'php']
            ],
            'cryptography' => [
                'title' => 'Cryptography',
                'linkText' => 'Cryptography',
                'description' => 'Learn how to make your data cryptographically-secure with Opulence',
                'keywords' => [
                    'opulence',
                    'cryptography',
                    'encryption',
                    'security',
                    'passwords',
                    'hashing',
                    'php'
                ]
            ],
            'environments' => [
                'title' => 'Environments',
                'linkText' => 'Environments',
                'description' => 'Learn how to setup environment variables in Opulence',
                'keywords' => ['opulence', 'environment variables', 'config', 'php']
            ],
            'error-handling' => [
                'title' => 'Error Handling',
                'linkText' => 'Error Handling',
                'description' => 'Learn about error handling in Opulence',
                'keywords' => ['opulence', 'errors', 'exceptions']
            ],
            'events' => [
                'title' => 'Events',
                'linkText' => 'Events',
                'description' => 'Learn about events in Opulence',
                'keywords' => ['opulence', 'events', 'dispatchers', 'php']
            ],
            'io' => [
                'title' => 'IO',
                'linkText' => 'Input/Output',
                'description' => 'Learn about working with IO in Opulence',
                'keywords' => ['opulence', 'io', 'stream', 'file system', 'read write', 'php']
            ],
            'ioc-container' => [
                'title' => 'IoC Container',
                'linkText' => 'IoC Container',
                'description' => 'Learn about dependency injection in Opulence',
                'keywords' => ['opulence', 'ioc', 'dependency injection', 'php']
            ],
            'memcached' => [
                'title' => 'Memcached',
                'linkText' => 'Memcached',
                'description' => 'Learn how to interact with Memcached databases in Opulence',
                'keywords' => ['opulence', 'nosql', 'memcached', 'cache', 'php']
            ],
            'pipelines' => [
                'title' => 'Pipelines',
                'linkText' => 'Pipelines',
                'description' => 'Learn how to pipeline data',
                'keywords' => ['opulence', 'pipeline', 'serial', 'php']
            ],
            'redis' => [
                'title' => 'Redis',
                'linkText' => 'Redis',
                'description' => 'Learn how to interact with Redis databases in Opulence',
                'keywords' => ['opulence', 'nosql', 'redis', 'cache', 'php']
            ],
            'validation' => [
                'title' => 'Validation',
                'linkText' => 'Validation',
                'description' => 'Learn how to validate data in Opulence',
                'keywords' => ['opulence', 'validation', 'forms', 'php']
            ]
        ]
    ]
];
$config['1.1'] = [
    'title' => '1.1',
    'default' => 'installing',
    'docs' => [
        'Getting Started' => [
            'installing' => [
                'title' => 'Installing',
                'linkText' => 'Installing',
                'description' => 'Learn how to install Opulence',
                'keywords' => ['opulence', 'install', 'php']
            ],
            'upgrading' => [
                'title' => 'Upgrading',
                'linkText' => 'Upgrading',
                'description' => 'Learn how to upgrade Opulence to the latest version',
                'keywords' => ['opulence', 'upgrade', 'update', 'php']
            ],
            'directory-structure' => [
                'title' => 'Directory Structure',
                'linkText' => 'Directory Structure',
                'description' => 'Learn about how Opulence is structured',
                'keywords' => ['opulence', 'structure', 'php']
            ],
            'contributing' => [
                'title' => 'Contributing',
                'linkText' => 'Contributing',
                'description' => 'Learn how to contribute to Opulence',
                'keywords' => ['opulence', 'contribute', 'open source']
            ]
        ],
        'HTTP Applications' => [
            'http-basics' => [
                'title' => 'HTTP Basics',
                'linkText' => 'Basics',
                'description' => 'Learn the basics of HTTP applications in Opulence',
                'keywords' => ['opulence', 'http', 'application', 'mvc', 'controller', 'middleware']
            ],
            'http-workflow' => [
                'title' => 'HTTP Application Workflow',
                'linkText' => 'Application Workflow',
                'description' => 'Learn about the workflow of HTTP applications in Opulence',
                'keywords' => ['opulence', 'http', 'workflow', 'php']
            ],
            'routing' => [
                'title' => 'Routing',
                'linkText' => 'Routing',
                'description' => 'Learn about creating an Opulence HTTP router',
                'keywords' => ['opulence', 'routing', 'router', 'http', 'php']
            ],
            'http-requests-responses' => [
                'title' => 'HTTP Requests/Responses',
                'linkText' => 'Requests/Responses',
                'description' => 'Learn about handling HTTP requests and responses in Opulence',
                'keywords' => ['opulence', 'http', 'requests', 'headers', 'cookies', 'php']
            ],
            'sessions' => [
                'title' => 'Sessions',
                'linkText' => 'Sessions',
                'description' => 'Learn about sessions in Opulence',
                'keywords' => ['opulence', 'sessions', 'php']
            ],
            'http-middleware' => [
                'title' => 'HTTP Middleware',
                'linkText' => 'Middleware',
                'description' => 'Learn about HTTP middleware in Opulence',
                'keywords' => ['opulence', 'middleware', 'http', 'requests', 'responses', 'php']
            ],
            'http-security' => [
                'title' => 'HTTP Security',
                'linkText' => 'Security',
                'description' => 'Learn about security in HTTP applications in Opulence',
                'keywords' => [
                    'opulence',
                    'security',
                    'http',
                    'css',
                    'xsrf',
                    'csrf',
                    'cross site request forgery',
                    'hack',
                    'php'
                ]
            ],
            'http-testing' => [
                'title' => 'Testing Your HTTP Application',
                'linkText' => 'Testing Your Application',
                'description' => 'Learn how to test an Opulence HTTP application',
                'keywords' => ['opulence', 'testing', 'tdd', 'phpunit', 'php']
            ]
        ],
        'Console Applications' => [
            'console-basics' => [
                'title' => 'Console Basics',
                'linkText' => 'Basics',
                'description' => 'Learn the basics of console applications in Opulence',
                'keywords' => ['opulence', 'console', 'command prompt', 'php']
            ],
            'console-workflow' => [
                'title' => 'Console Application Workflow',
                'linkText' => 'Application Workflow',
                'description' => 'Learn about the workflow of HTTP console in Opulence',
                'keywords' => ['opulence', 'console', 'workflow', 'php']
            ],
            'console-requests-responses' => [
                'title' => 'Console Requests/Responses',
                'linkText' => 'Requests/Responses',
                'description' => 'Learn about console requests and responses',
                'keywords' => ['opulence', 'console', 'requests', 'responses', 'php']
            ],
            'console-creating-commands' => [
                'title' => 'Creating Commands',
                'linkText' => 'Creating Commands',
                'description' => 'Learn how to create custom console commands in Opulence',
                'keywords' => ['opulence', 'console', 'commands', 'php']
            ],
            'console-testing' => [
                'title' => 'Testing Your Console Application',
                'linkText' => 'Testing Your Application',
                'description' => 'Learn how to test an Opulence console application',
                'keywords' => ['opulence', 'testing', 'tdd', 'phpunit', 'php']
            ]
        ],
        'Views' => [
            'view-basics' => [
                'title' => 'View Basics',
                'linkText' => 'Basics',
                'description' => 'Learn how to build templates in Opulence',
                'keywords' => ['opulence', 'views', 'template', 'fortune', 'php']
            ],
            'view-fortune' => [
                'title' => 'Fortune',
                'linkText' => 'Fortune',
                'description' => 'Learn how Fortune can build powerful page templates',
                'keywords' => ['opulence', 'fortune', 'views', 'template', 'php']
            ]
        ],
        'Databases' => [
            'database-basics' => [
                'title' => 'Database Basics',
                'linkText' => 'Basics',
                'description' => 'Learn about working with relational databases in Opulence',
                'keywords' => ['opulence', 'rdbms', 'mysql', 'postgresql', 'pdo', 'sql', 'database', 'php']
            ],
            'database-query-builders' => [
                'title' => 'Query Builders',
                'linkText' => 'Query Builders',
                'description' => 'Learn about Opulence SQL query builders',
                'keywords' => ['opulence', 'programmatically build', 'queries', 'sql', 'php']
            ],
            'database-migrations' => [
                'title' => 'Database Migrations',
                'linkText' => 'Migrations',
                'description' => 'Learn about using database migrations in Opulence',
                'keywords' => ['opulence', 'rdbms', 'mysql', 'postgresql', 'migration', 'sql', 'database', 'php']
            ],
            'database-type-mappers' => [
                'title' => 'Type Mappers',
                'linkText' => 'Type Mappers',
                'description' => 'Learn about casting to and from relational database types',
                'keywords' => ['opulence', 'sql', 'cast', 'type mapping', 'php']
            ]
        ],
        'ORM' => [
            'orm-basics' => [
                'title' => 'ORM Basics',
                'linkText' => 'Basics',
                'description' => 'Learn the basics of ORM in Opulence',
                'keywords' => ['opulence', 'orm', 'repository', 'data mapper']
            ],
            'orm-repositories' => [
                'title' => 'Repositories',
                'linkText' => 'Repositories',
                'description' => 'Learn about repositories in Opulence',
                'keywords' => ['opulence', 'orm', 'repository']
            ],
            'orm-data-mappers' => [
                'title' => 'Data Mappers',
                'linkText' => 'Data Mappers',
                'description' => 'Learn about data mappers in Opulence',
                'keywords' => ['opulence', 'orm', 'repository', 'data mapper']
            ],
            'orm-units-of-work' => [
                'title' => 'Unit of Work',
                'linkText' => 'Unit of Work',
                'description' => 'Learn about units of work and ORM in Opulence',
                'keywords' => ['opulence', 'orm', 'repository', 'data mapper', 'unit of work', 'uow']
            ]
        ],
        'Framework' => [
            'authentication' => [
                'title' => 'Authentication',
                'linkText' => 'Authentication',
                'description' => 'Learn about authentication in Opulence',
                'keywords' => ['opulence', 'authentication', 'users']
            ],
            'authorization' => [
                'title' => 'Authorization',
                'linkText' => 'Authorization',
                'description' => 'Learn about authorization in Opulence',
                'keywords' => ['opulence', 'authorization', 'users']
            ],
            'bootstrappers' => [
                'title' => 'Bootstrappers',
                'linkText' => 'Bootstrappers',
                'description' => 'Learn how to configure an Opulence application',
                'keywords' => ['opulence', 'configuration', 'bootstrapper', 'php']
            ],
            'cache' => [
                'title' => 'Cache',
                'linkText' => 'Cache',
                'description' => 'Learn how to use cache in an Opulence application',
                'keywords' => ['opulence', 'cache', 'Redis', 'Memcached', 'php']
            ],
            'collections' => [
                'title' => 'Collections',
                'linkText' => 'Collections',
                'description' => 'Learn about collections in Opulence',
                'keywords' => ['opulence', 'collections', 'hash tables', 'array lists', 'stacks', 'queues']
            ],
            'cryptography' => [
                'title' => 'Cryptography',
                'linkText' => 'Cryptography',
                'description' => 'Learn how to make your data cryptographically-secure with Opulence',
                'keywords' => [
                    'opulence',
                    'cryptography',
                    'encryption',
                    'security',
                    'passwords',
                    'hashing',
                    'php'
                ]
            ],
            'environments' => [
                'title' => 'Environments',
                'linkText' => 'Environments',
                'description' => 'Learn how to setup environment variables in Opulence',
                'keywords' => ['opulence', 'environment variables', 'config', 'php']
            ],
            'error-handling' => [
                'title' => 'Error Handling',
                'linkText' => 'Error Handling',
                'description' => 'Learn about error handling in Opulence',
                'keywords' => ['opulence', 'errors', 'exceptions']
            ],
            'events' => [
                'title' => 'Events',
                'linkText' => 'Events',
                'description' => 'Learn about events in Opulence',
                'keywords' => ['opulence', 'events', 'dispatchers', 'php']
            ],
            'io' => [
                'title' => 'IO',
                'linkText' => 'Input/Output',
                'description' => 'Learn about working with IO in Opulence',
                'keywords' => ['opulence', 'io', 'stream', 'file system', 'read write', 'php']
            ],
            'ioc-container' => [
                'title' => 'IoC Container',
                'linkText' => 'IoC Container',
                'description' => 'Learn about dependency injection in Opulence',
                'keywords' => ['opulence', 'ioc', 'dependency injection', 'php']
            ],
            'memcached' => [
                'title' => 'Memcached',
                'linkText' => 'Memcached',
                'description' => 'Learn how to interact with Memcached databases in Opulence',
                'keywords' => ['opulence', 'nosql', 'memcached', 'cache', 'php']
            ],
            'pipelines' => [
                'title' => 'Pipelines',
                'linkText' => 'Pipelines',
                'description' => 'Learn how to pipeline data',
                'keywords' => ['opulence', 'pipeline', 'serial', 'php']
            ],
            'redis' => [
                'title' => 'Redis',
                'linkText' => 'Redis',
                'description' => 'Learn how to interact with Redis databases in Opulence',
                'keywords' => ['opulence', 'nosql', 'redis', 'cache', 'php']
            ],
            'validation' => [
                'title' => 'Validation',
                'linkText' => 'Validation',
                'description' => 'Learn how to validate data in Opulence',
                'keywords' => ['opulence', 'validation', 'forms', 'php']
            ]
        ]
    ]
];
$config['1.0'] = [
    'title' => '1.0',
    'default' => 'installing',
    'docs' => [
        'Getting Started' => [
            'installing' => [
                'title' => 'Installing',
                'linkText' => 'Installing',
                'description' => 'Learn how to install Opulence',
                'keywords' => ['opulence', 'install', 'php']
            ],
            'upgrading' => [
                'title' => 'Upgrading',
                'linkText' => 'Upgrading',
                'description' => 'Learn how to upgrade Opulence to the latest version',
                'keywords' => ['opulence', 'upgrade', 'update', 'php']
            ],
            'directory-structure' => [
                'title' => 'Directory Structure',
                'linkText' => 'Directory Structure',
                'description' => 'Learn about how Opulence is structured',
                'keywords' => ['opulence', 'structure', 'php']
            ],
            'contributing' => [
                'title' => 'Contributing',
                'linkText' => 'Contributing',
                'description' => 'Learn how to contribute to Opulence',
                'keywords' => ['opulence', 'contribute', 'open source']
            ]
        ],
        'HTTP Applications' => [
            'http-basics' => [
                'title' => 'HTTP Basics',
                'linkText' => 'Basics',
                'description' => 'Learn the basics of HTTP applications in Opulence',
                'keywords' => ['opulence', 'http', 'application', 'mvc', 'controller', 'middleware']
            ],
            'http-workflow' => [
                'title' => 'HTTP Application Workflow',
                'linkText' => 'Application Workflow',
                'description' => 'Learn about the workflow of HTTP applications in Opulence',
                'keywords' => ['opulence', 'http', 'workflow', 'php']
            ],
            'routing' => [
                'title' => 'Routing',
                'linkText' => 'Routing',
                'description' => 'Learn about creating an Opulence HTTP router',
                'keywords' => ['opulence', 'routing', 'router', 'http', 'php']
            ],
            'http-requests-responses' => [
                'title' => 'HTTP Requests/Responses',
                'linkText' => 'Requests/Responses',
                'description' => 'Learn about handling HTTP requests and responses in Opulence',
                'keywords' => ['opulence', 'http', 'requests', 'headers', 'cookies', 'php']
            ],
            'sessions' => [
                'title' => 'Sessions',
                'linkText' => 'Sessions',
                'description' => 'Learn about sessions in Opulence',
                'keywords' => ['opulence', 'sessions', 'php']
            ],
            'http-middleware' => [
                'title' => 'HTTP Middleware',
                'linkText' => 'Middleware',
                'description' => 'Learn about HTTP middleware in Opulence',
                'keywords' => ['opulence', 'middleware', 'http', 'requests', 'responses', 'php']
            ],
            'http-security' => [
                'title' => 'HTTP Security',
                'linkText' => 'Security',
                'description' => 'Learn about security in HTTP applications in Opulence',
                'keywords' => [
                    'opulence',
                    'security',
                    'http',
                    'css',
                    'xsrf',
                    'csrf',
                    'cross site request forgery',
                    'hack',
                    'php'
                ]
            ],
            'http-testing' => [
                'title' => 'Testing Your HTTP Application',
                'linkText' => 'Testing Your Application',
                'description' => 'Learn how to test an Opulence HTTP application',
                'keywords' => ['opulence', 'testing', 'tdd', 'phpunit', 'php']
            ]
        ],
        'Console Applications' => [
            'console-basics' => [
                'title' => 'Console Basics',
                'linkText' => 'Basics',
                'description' => 'Learn the basics of console applications in Opulence',
                'keywords' => ['opulence', 'console', 'command prompt', 'php']
            ],
            'console-workflow' => [
                'title' => 'Console Application Workflow',
                'linkText' => 'Application Workflow',
                'description' => 'Learn about the workflow of HTTP console in Opulence',
                'keywords' => ['opulence', 'console', 'workflow', 'php']
            ],
            'console-requests-responses' => [
                'title' => 'Console Requests/Responses',
                'linkText' => 'Requests/Responses',
                'description' => 'Learn about console requests and responses',
                'keywords' => ['opulence', 'console', 'requests', 'responses', 'php']
            ],
            'console-creating-commands' => [
                'title' => 'Creating Commands',
                'linkText' => 'Creating Commands',
                'description' => 'Learn how to create custom console commands in Opulence',
                'keywords' => ['opulence', 'console', 'commands', 'php']
            ],
            'console-testing' => [
                'title' => 'Testing Your Console Application',
                'linkText' => 'Testing Your Application',
                'description' => 'Learn how to test an Opulence console application',
                'keywords' => ['opulence', 'testing', 'tdd', 'phpunit', 'php']
            ]
        ],
        'Views' => [
            'view-basics' => [
                'title' => 'View Basics',
                'linkText' => 'Basics',
                'description' => 'Learn how to build templates in Opulence',
                'keywords' => ['opulence', 'views', 'template', 'fortune', 'php']
            ],
            'view-fortune' => [
                'title' => 'Fortune',
                'linkText' => 'Fortune',
                'description' => 'Learn how Fortune can build powerful page templates',
                'keywords' => ['opulence', 'fortune', 'views', 'template', 'php']
            ]
        ],
        'Databases' => [
            'database-basics' => [
                'title' => 'Database Basics',
                'linkText' => 'Basics',
                'description' => 'Learn about working with relational databases in Opulence',
                'keywords' => ['opulence', 'rdbms', 'mysql', 'postgresql', 'pdo', 'sql', 'database', 'php']
            ],
            'database-query-builders' => [
                'title' => 'Query Builders',
                'linkText' => 'Query Builders',
                'description' => 'Learn about Opulence SQL query builders',
                'keywords' => ['opulence', 'programmatically build', 'queries', 'sql', 'php']
            ],
            'database-type-mappers' => [
                'title' => 'Type Mappers',
                'linkText' => 'Type Mappers',
                'description' => 'Learn about casting to and from relational database types',
                'keywords' => ['opulence', 'sql', 'cast', 'type mapping', 'php']
            ]
        ],
        'ORM' => [
            'orm-basics' => [
                'title' => 'ORM Basics',
                'linkText' => 'Basics',
                'description' => 'Learn the basics of ORM in Opulence',
                'keywords' => ['opulence', 'orm', 'repository', 'data mapper']
            ],
            'orm-repositories' => [
                'title' => 'Repositories',
                'linkText' => 'Repositories',
                'description' => 'Learn about repositories in Opulence',
                'keywords' => ['opulence', 'orm', 'repository']
            ],
            'orm-data-mappers' => [
                'title' => 'Data Mappers',
                'linkText' => 'Data Mappers',
                'description' => 'Learn about data mappers in Opulence',
                'keywords' => ['opulence', 'orm', 'repository', 'data mapper']
            ],
            'orm-units-of-work' => [
                'title' => 'Unit of Work',
                'linkText' => 'Unit of Work',
                'description' => 'Learn about units of work and ORM in Opulence',
                'keywords' => ['opulence', 'orm', 'repository', 'data mapper', 'unit of work', 'uow']
            ]
        ],
        'Framework' => [
            'application' => [
                'title' => 'Applications',
                'linkText' => 'Applications',
                'description' => 'Learn about the inner-workings of an Opulence application',
                'keywords' => ['opulence', 'application', 'php']
            ],
            'authentication' => [
                'title' => 'Authentication',
                'linkText' => 'Authentication',
                'description' => 'Learn about authentication in Opulence',
                'keywords' => ['opulence', 'authentication', 'users']
            ],
            'authorization' => [
                'title' => 'Authorization',
                'linkText' => 'Authorization',
                'description' => 'Learn about authorization in Opulence',
                'keywords' => ['opulence', 'authorization', 'users']
            ],
            'bootstrappers' => [
                'title' => 'Bootstrappers',
                'linkText' => 'Bootstrappers',
                'description' => 'Learn how to configure an Opulence application',
                'keywords' => ['opulence', 'configuration', 'bootstrapper', 'php']
            ],
            'cache' => [
                'title' => 'Cache',
                'linkText' => 'Cache',
                'description' => 'Learn how to use cache in an Opulence application',
                'keywords' => ['opulence', 'cache', 'Redis', 'Memcached', 'php']
            ],
            'cryptography' => [
                'title' => 'Cryptography',
                'linkText' => 'Cryptography',
                'description' => 'Learn how to make your data cryptographically-secure with Opulence',
                'keywords' => [
                    'opulence',
                    'cryptography',
                    'encryption',
                    'security',
                    'passwords',
                    'hashing',
                    'php'
                ]
            ],
            'environments' => [
                'title' => 'Environments',
                'linkText' => 'Environments',
                'description' => 'Learn how to setup environment variables in Opulence',
                'keywords' => ['opulence', 'environment variables', 'config', 'php']
            ],
            'error-handling' => [
                'title' => 'Error Handling',
                'linkText' => 'Error Handling',
                'description' => 'Learn about error handling in Opulence',
                'keywords' => ['opulence', 'errors', 'exceptions']
            ],
            'events' => [
                'title' => 'Events',
                'linkText' => 'Events',
                'description' => 'Learn about events in Opulence',
                'keywords' => ['opulence', 'events', 'dispatchers', 'php']
            ],
            'files' => [
                'title' => 'File System',
                'linkText' => 'File System',
                'description' => 'Learn about working with the file system in Opulence',
                'keywords' => ['opulence', 'file system', 'read write', 'php']
            ],
            'ioc-container' => [
                'title' => 'IoC Container',
                'linkText' => 'IoC Container',
                'description' => 'Learn about dependency injection in Opulence',
                'keywords' => ['opulence', 'ioc', 'dependency injection', 'php']
            ],
            'memcached' => [
                'title' => 'Memcached',
                'linkText' => 'Memcached',
                'description' => 'Learn how to interact with Memcached databases in Opulence',
                'keywords' => ['opulence', 'nosql', 'memcached', 'cache', 'php']
            ],
            'pipelines' => [
                'title' => 'Pipelines',
                'linkText' => 'Pipelines',
                'description' => 'Learn how to pipeline data',
                'keywords' => ['opulence', 'pipeline', 'serial', 'php']
            ],
            'redis' => [
                'title' => 'Redis',
                'linkText' => 'Redis',
                'description' => 'Learn how to interact with Redis databases in Opulence',
                'keywords' => ['opulence', 'nosql', 'redis', 'cache', 'php']
            ],
            'validation' => [
                'title' => 'Validation',
                'linkText' => 'Validation',
                'description' => 'Learn how to validate data in Opulence',
                'keywords' => ['opulence', 'validation', 'forms', 'php']
            ]
        ]
    ]
];

return $config;
