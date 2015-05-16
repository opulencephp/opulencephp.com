<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the command that generates API docs
 */
namespace RDevWebsite\Console\Commands;
use RDevWebsite\Docs\API as APIDocs;
use RDev\Console\Commands\Command;
use RDev\Console\Responses\IResponse;

class APICommand extends Command
{
    /** @var APIDocs The tool to generate docs */
    private $api = null;

    /**
     * @param APIDocs $api The tool to generate API docs
     */
    public function __construct(APIDocs $api)
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
    protected function doExecute(IResponse $response)
    {
        $this->api->compile();
        $response->writeln("<success>API docs created</success>");
    }
}