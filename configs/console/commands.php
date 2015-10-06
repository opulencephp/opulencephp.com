<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the list of console command classes to load
 */
use OpulenceWebsite\Console\Commands\APICommand;
use OpulenceWebsite\Console\Commands\DocsCommand;

return [
    APICommand::class,
    DocsCommand::class
];