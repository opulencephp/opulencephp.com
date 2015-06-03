<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines the list of console command classes to load
 */
use RDevWebsite\Console\Commands\APICommand;
use RDevWebsite\Console\Commands\DocsCommand;

/**
 * ----------------------------------------------------------
 * List of command classes
 * ----------------------------------------------------------
 */
return [
    APICommand::class,
    DocsCommand::class
];