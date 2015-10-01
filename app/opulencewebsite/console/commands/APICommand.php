<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the command that generates API docs
 */
namespace OpulenceWebsite\Console\Commands;

use OpulenceWebsite\Docs\API as APIDocs;
use Opulence\Console\Commands\Command;
use Opulence\Console\Responses\IResponse;

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
     * @inheritdoc
     */
    protected function define()
    {
        $this->setName("api")
            ->setDescription("Generates API docs for Opulence");
    }

    /**
     * @inheritdoc
     */
    protected function doExecute(IResponse $response)
    {
        $this->api->compile();
        $response->writeln("<success>API docs created</success>");
    }
}