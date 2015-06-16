<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines the Sami configuration
 */
use Sami\RemoteRepository\GitHubRemoteRepository;
use Sami\Sami;
use Sami\Version\GitVersionCollection;

$versions = GitVersionCollection::create($dir = __DIR__ . "/../tmp/api/versions/RDev")
    ->add("0.5", "RDev 0.5")
    ->add("master", "RDev Master");

return new Sami(
    $dir,
    [
        "title" => "RDev API",
        "versions" => $versions,
        "remote_repository" => new GitHubRemoteRepository("ramblingsofadev/RDev", dirname($dir)),
        "build_dir" => __DIR__ . "/../tmp/api/build/%version%",
        "cache_dir" => __DIR__ . "/../tmp/api/cache/%version%",
        "default_opened_level" => 2
    ]
);