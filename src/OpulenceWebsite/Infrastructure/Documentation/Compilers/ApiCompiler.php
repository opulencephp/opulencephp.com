<?php
/**
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2016 David Young
 * @license   https://github.com/opulencephp/opulencephp.com/blob/master/LICENSE.md
 */
namespace OpulenceWebsite\Infrastructure\Documentation\Compilers;

use Opulence\Files\FileSystem;
use OpulenceWebsite\Domain\Documentation\Compilers\IApiCompiler;

/**
 * Defines the API compiler
 */
class ApiCompiler implements IApiCompiler
{
    /** The GitHub docs repository */
    private const GITHUB_REPOSITORY = "https://github.com/opulencephp/Opulence.git";
    /** @var array The list of versions to create APIs for */
    private static $branches = ["1.0", "master"];
    /** @var FileSystem The file system */
    private $files = null;
    /** @var string The path to the config directory */
    private $configPath = "";
    /** @var string The path to the public directory */
    private $publicPath = "";
    /** @var string The path to the cloned doc directory */
    private $clonedDocPath = "";
    /** @var string The path to the vendor directory */
    private $vendorPath = "";

    /**
     * @param FileSystem $files The file system
     * @param string $configPath The path to the config directory
     * @param string $publicPath The path to the public directory
     * @param string $clonedDocPath The path to the cloned doc directory
     * @param string $vendorPath The path to the vendor directory
     */
    public function __construct(
        FileSystem $files,
        string $configPath,
        string $publicPath,
        string $clonedDocPath,
        string $vendorPath
    ) {
        $this->files = $files;
        $this->configPath = $configPath;
        $this->publicPath = $publicPath;
        $this->clonedDocPath = $clonedDocPath;
        $this->vendorPath = $vendorPath;
    }

    /**
     * @inheritdoc
     */
    public function compile() : string
    {
        $this->clearTempFiles();

        // Grab the branches from Git
        $rawDocsPath = "{$this->clonedDocPath}/versions";
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
                $this->vendorPath,
                $this->configPath
            )
        );

        // Move them to the public directory
        foreach (self::$branches as $branchName) {
            $this->files->copyDirectory("{$this->clonedDocPath}/build/$branchName",
                "{$this->publicPath}/api/$branchName");
        }

        $this->clearTempFiles();

        return $samiOutput;
    }

    /**
     * Clears the temporary files
     */
    private function clearTempFiles() : void
    {
        shell_exec(
            sprintf(
                "rm -rf %s/build",
                $this->clonedDocPath
            )
        );
        shell_exec(
            sprintf(
                "rm -rf %s/cache",
                $this->clonedDocPath
            )
        );
    }
}