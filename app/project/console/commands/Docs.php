<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines the command that generates HTML from the markdown docs
 */
namespace Project\Console\Commands;
use Project\Docs as ProjectDocs;
use RDev\Console\Commands;
use RDev\Console\Responses;

class Docs extends Commands\Command
{
    /** @var ProjectDocs\Documentation The tool to read/write docs */
    private $docs = null;

    /**
     * @param ProjectDocs\Documentation $docs The tool to read/write docs
     */
    public function __construct(ProjectDocs\Documentation $docs)
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
    protected function doExecute(Responses\IResponse $response)
    {
        $response->write($this->docs->compile());
        $response->writeln("<success>Docs created</success>");
    }
}