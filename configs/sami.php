<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines the Sami configuration
 */
use Sami\Sami;

return new Sami(
    __DIR__ . "/../vendor/rdev/rdev/app/rdev",
    [
        "title" => "RDev API",
        "build_dir" => __DIR__ . "/../tmp/api/build",
        "cache_dir" => __DIR__ . "/../tmp/api/cache",
        "default_opened_level" => 2
    ]
);