<?php
/**
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2016 David Young
 * @license   https://github.com/opulencephp/Opulence/blob/master/LICENSE.md
 */
namespace OpulenceWebsite\Domain\Documentation\Compilers;

/**
 * Defines the interface for the documentation compiler
 */
interface IDocumentationCompiler
{
    /** The GitHub docs repository */
    const GITHUB_REPOSITORY = "https://github.com/opulencephp/docs.git";

    /**
     * Compiles the documentation
     *
     * @return string The raw output of the compiler
     */
    public function compile() : string;
}