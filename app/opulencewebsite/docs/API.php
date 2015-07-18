<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines the API docs
 */
namespace OpulenceWebsite\Docs;
use Opulence\Applications\Paths;
use Opulence\Files\FileSystem;

class API
{
    /** The GitHub docs repository */
    const GITHUB_REPOSITORY = "https://github.com/opulencephp/Opulence.git";

    /** @var array The list of versions to create APIs for */
    private static $branches = ["0.5", "master"];
    /** @var Paths The application paths */
    private $paths = null;
    /** @var FileSystem The file system */
    private $files = null;

    /**
     * @param Paths $paths The application paths
     * @param FileSystem $files The file system
     */
    public function __construct(Paths $paths, FileSystem $files)
    {
        $this->paths = $paths;
        $this->files = $files;
    }

    /**
     * Compiles the latest source code API documentation
     *
     * @return string The output of the compilation
     */
    public function compile()
    {
        $this->clearTempFiles();

        // Grab the branches from Git
        $rawDocsPath = "{$this->paths["tmp.api"]}/versions";
        shell_exec(
            sprintf(
                "rm -rf %s* && mkdir %s && cd %s && git clone %s",
                $rawDocsPath,
                $rawDocsPath,
                $rawDocsPath,
                self::GITHUB_REPOSITORY
            )
        );

        // Generate the API docs
        $samiOutput = shell_exec(
            sprintf(
                'php %s/bin/sami.php update %s/sami.php',
                $this->paths["vendor"],
                $this->paths["configs"]
            )
        );

        // Move them to the public directory
        foreach(self::$branches as $branchName)
        {
            $this->files->copyDirectory($this->paths["tmp.api"] . "/build/$branchName", $this->paths["public"] . "/api/$branchName");
        }

        $this->clearTempFiles();

        return $samiOutput;
    }

    /**
     * Clears the temporary files
     */
    private function clearTempFiles()
    {
        shell_exec(
            sprintf(
                "rm -rf %s/build",
                $this->paths["tmp.api"]
            )
        );
        shell_exec(
            sprintf(
                "rm -rf %s/cache",
                $this->paths["tmp.api"]
            )
        );
    }
}