<?php
/**
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2017 David Young
 * @license   https://github.com/opulencephp/opulencephp.com/blob/master/LICENSE.md
 */
use Opulence\Debug\Errors\Handlers\ErrorHandler;

/**
 * ----------------------------------------------------------
 * Define the error handler
 * ----------------------------------------------------------
 */
return new ErrorHandler($logger, $exceptionHandler);