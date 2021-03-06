<?php

/*
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2021 David Young
 * @license   https://github.com/opulencephp/Opulence/blob/master/LICENSE.md
 */

use Opulence\Debug\Errors\Handlers\ErrorHandler;

/**
 * ----------------------------------------------------------
 * Define the error handler
 * ----------------------------------------------------------
 */
return new ErrorHandler($logger, $exceptionHandler);
