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
 * Defines the interface for the API compiler
 */
interface IApiCompiler
{
    /**
     * Compiles the API
     *
     * @return string The raw output of the compiler
     */
    public function compile() : string;
}