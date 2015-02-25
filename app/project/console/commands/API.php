<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the command that generates API docs
 */
namespace Project\Console\Commands;
use Project\Docs as ProjectDocs;
use RDev\Console\Commands;
use RDev\Console\Responses;

class API extends Commands\Command
{
    /** @var ProjectDocs\API The tool to generate docs */
    private $api = null;

    /**
     * @param ProjectDocs\API $api The tool to generate API docs
     */
    public function __construct(ProjectDocs\API $api)
    {
        parent::__construct();

        $this->api = $api;
    }

    /**
     * {@inheritdoc}
     */
    protected function define()
    {
        $this->setName("api")
            ->setDescription("Generates API docs for RDev");
    }

    /**
     * {@inheritdoc}
     */
    protected function doExecute(Responses\IResponse $response)
    {
        $this->api->compile();
        $response->writeln("<success>API docs created</success>");
    }
}