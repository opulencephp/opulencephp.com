<?php
/**
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2015 David Young
 * @license   https://github.com/opulencephp/opulencephp.com/blob/master/LICENSE.md
 */
/**
 * ----------------------------------------------------------
 * Define the view config
 * ----------------------------------------------------------
 */
return [
    /**
     * ----------------------------------------------------------
     * General settings
     * ----------------------------------------------------------
     *
     * "cache.lifetime" => Lifetime of the cached views in seconds
     */
    "cache.lifetime" => 3600,

    /**
     * ----------------------------------------------------------
     * Garbage collection settings
     * ----------------------------------------------------------
     *
     * "gc.chance" => The chance that garbage collection will be run
     * "gc.divisor" => The divisor to calculate the probability (default is 1 in 100 chance)
     */
    "gc.chance" => 1,
    "gc.divisor" => 100
];