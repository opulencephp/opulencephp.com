<?php

/*
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2021 David Young
 * @license   https://github.com/opulencephp/Opulence/blob/master/LICENSE.md
 */

namespace Project\Application\Console\Commands\Documentation;

use Opulence\Console\Commands\Command;
use Opulence\Console\Responses\IResponse;
use Project\Domain\Documentation\Compilers\IDocumentationCompiler;

/**
 * Defines the command that generates HTML from the markdown docs
 */
class CompileDocumentationCommand extends Command
{
    /** @var IDocumentationCompiler The documentation compiler */
    private $documentationCompiler = null;

    /**
     * @param IDocumentationCompiler $documentationCompiler The documentation compiler
     */
    public function __construct(IDocumentationCompiler $documentationCompiler)
    {
        parent::__construct();

        $this->documentationCompiler = $documentationCompiler;
    }

    /**
     * @inheritdoc
     */
    protected function define() : void
    {
        $this->setName('compile:docs')
            ->setDescription('Grabs the latest docs and compiles them into HTML');
    }

    /**
     * @inheritdoc
     */
    protected function doExecute(IResponse $response) : void
    {
        $response->write($this->documentationCompiler->compile());
        $response->writeln('<success>Documentation created</success>');
    }
}
