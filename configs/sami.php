<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines the Sami configuration
 */
use Sami\RemoteRepository\GitHubRemoteRepository;
use Sami\Sami;
use Sami\Version\GitVersionCollection;

$versions = GitVersionCollection::create($dir = __DIR__ . "/../tmp/api/versions/Opulence/app")
    ->add("0.6", "Opulence 0.6");

return new Sami(
    $dir,
    [
        "title" => "Opulence API",
        "versions" => $versions,
        "remote_repository" => new GitHubRemoteRepository("opulencephp/Opulence", dirname($dir)),
        "build_dir" => __DIR__ . "/../tmp/api/build/%version%",
        "cache_dir" => __DIR__ . "/../tmp/api/cache/%version%",
        "default_opened_level" => 2
    ]
);