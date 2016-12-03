<?php
/**
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2016 David Young
 * @license   https://github.com/opulencephp/opulencephp.com/blob/master/LICENSE.md
 */
namespace OpulenceWebsite\Application\Console\Commands\Documentation;

use Opulence\Console\Commands\Command;
use Opulence\Console\Responses\IResponse;
use OpulenceWebsite\Domain\Documentation\Compilers\IApiCompiler;

/**
 * Defines the command that compiles API docs
 */
class CompileApiCommand extends Command
{
    /** @var IApiCompiler The compiler to generate docs */
    private $apiCompiler = null;

    /**
     * @param IApiCompiler $apiCompiler The compiler to generate API docs
     */
    public function __construct(IApiCompiler $apiCompiler)
    {
        parent::__construct();

        $this->apiCompiler = $apiCompiler;
    }

    /**
     * @inheritdoc
     */
    protected function define() : void
    {
        $this->setName("compile:api")
            ->setDescription("Generates API docs for Opulence");
    }

    /**
     * @inheritdoc
     */
    protected function doExecute(IResponse $response) : void
    {
        $this->apiCompiler->compile();
        $response->writeln("<success>API docs created</success>");
    }
}