<?php
/**
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2016 David Young
 * @license   https://github.com/opulencephp/opulencephp.com/blob/master/LICENSE.md
 */
/**
 * ----------------------------------------------------------
 * Define the Sami config
 * ----------------------------------------------------------
 */
use Sami\RemoteRepository\GitHubRemoteRepository;
use Sami\Sami;
use Sami\Version\GitVersionCollection;

$versions = GitVersionCollection::create($dir = __DIR__ . "/../tmp/api/versions/Opulence/src")
    ->add("master", "Opulence Master")
    ->add("1.0", "Opulence 1.0");

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