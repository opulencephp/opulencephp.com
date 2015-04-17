<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines the command that generates HTML from the markdown docs
 */
namespace Project\Console\Commands;
use Project\Docs\Documentation;
use RDev\Console\Commands\Command;
use RDev\Console\Responses\IResponse;

class DocsCommand extends Command
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
     * {@inheritdoc}
     */
    protected function define()
    {
        $this->setName("docs")
            ->setDescription("Grabs the latest docs and compiles them into HTML");
    }

    /**
     * {@inheritdoc}
     */
    protected function doExecute(IResponse $response)
    {
        $response->write($this->docs->compile());
        $response->writeln("<success>Docs created</success>");
    }
}