<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines the API docs
 */
namespace Project\Docs;
use RDev\Applications\Paths;
use RDev\Files\FileSystem;

class API
{
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
        // Generate the API docs
        $samiOutput = shell_exec(
            sprintf(
                'php %s/bin/sami.php update %s/sami.php',
                $this->paths["vendor"],
                $this->paths["configs"]
            )
        );
        // Move them to the public directory
        $this->files->copyDirectory($this->paths["tmp"] . "/api/build", $this->paths["public"] . "/api/master");
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
                "rm -rf %s/api/build",
                $this->paths["tmp"]
            )
        );
        shell_exec(
            sprintf(
                "rm -rf %s/api/cache",
                $this->paths["tmp"]
            )
        );
    }
}