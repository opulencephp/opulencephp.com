<?php

/*
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2017 David Young
 * @license   https://github.com/opulencephp/Opulence/blob/master/LICENSE.md
 */

namespace Project\Application\Config;

/**
 * Defines a wrapper for the documentation config
 */
class DocumentationConfig
{
    /** The default branch to show in the docs */
    public const DEFAULT_BRANCH = '1.0';
    /** @var array The config for the docs */
    private $config = [];

    /**
     * @param array $rawConfig The raw config for the docs
     */
    public function __construct(array $rawConfig)
    {
        $this->config = $rawConfig;
    }

    /**
     * Gets the branch names to their titles
     *
     * @return array The mapping of branch names to their titles
     */
    public function getBranchTitles() : array
    {
        $titles = [];

        foreach ($this->config as $name => $data) {
            $titles[$name] = $data['title'];
        }

        return $titles;
    }

    /**
     * Gets the name of the default doc for a version
     *
     * @param string $version The version to get
     * @return string The default doc
     */
    public function getDefaultDoc(string $version) : string
    {
        return $this->config[$version]['default'];
    }

    /**
     * Gets the config for docs for a version
     *
     * @param string $version The version to get
     * @return array The docs config
     */
    public function getDocs($version) : array
    {
        return $this->config[$version]['docs'];
    }

    /**
     * Gets all of the docs for a branch as a flattened array
     *
     * @param string $version The version to get
     * @return array The flattened docs
     */
    public function getFlattenedDocs(string $version) : array
    {
        $flattenedDocs = [];

        foreach ($this->config[$version]['docs'] as $sectionHeader => $docs) {
            $flattenedDocs = array_merge($flattenedDocs, $docs);
        }

        return $flattenedDocs;
    }

    /**
     * Gets whether or not a doc exists for a specific version
     *
     * @param string $version The name of the version to get
     * @param string $name The name of the document
     * @return bool True if the document exists, otherwise false
     */
    public function hasDoc(string $version, string $name) : bool
    {
        if (!isset($this->config[$version])) {
            return false;
        }

        $docs = $this->getFlattenedDocs($version);

        return isset($docs[$name]);
    }

    /**
     * Gets whether or not a version has docs
     *
     * @param string $version The name of the version to get
     * @return bool True if the version exists, otherwise false
     */
    public function hasVersion(string $version) : bool
    {
        return isset($this->config[$version]);
    }
}
