<?php
/**
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2015 David Young
 * @license   https://github.com/opulencephp/Opulence/blob/master/LICENSE.md
 */
namespace OpulenceWebsite\Console\Commands;

use OpulenceWebsite\Docs\Documentation;
use Opulence\Console\Commands\Command;
use Opulence\Console\Responses\IResponse;

/**
 * Defines the command that generates HTML from the markdown docs
 */
class  DocsCommand extends Command
{
    /** @var Documentation The tool to read/write docs */
    private $docs = null;

    /**
     * @param Documentation $docs The tool to read/write docs
     */
    public function __construct(Documentation $docs)
    {
        parent::__construct();

        $this->docs = $docs;
    }

    /**
     * @inheritdoc
     */
    protected function define()
    {
        $this->setName("docs")
            ->setDescription("Grabs the latest docs and compiles them into HTML");
    }

    /**
     * @inheritdoc
     */
    protected function doExecute(IResponse $response)
    {
        $response->write($this->docs->compile());
        $response->writeln("<success>Docs created</success>");
    }
}