<?php
/**
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2016 David Young
 * @license   https://github.com/opulencephp/Opulence/blob/master/LICENSE.md
 */
namespace OpulenceWebsite\Domain\Documentation\Factories;

/**
 * Defines the interface for documentation factories to implement
 */
interface IDocumentationFactory
{
    /**
     * Gets the compiled document
     *
     * @param string $name The name of the document we want
     * @param string $version The version of Opulence we want
     * @return string The parsed document
     */
    public function createDocument(string $name, string $version) : string;
}