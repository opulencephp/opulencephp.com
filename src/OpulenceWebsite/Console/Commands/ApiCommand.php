<?php
/**
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2016 David Young
 * @license   https://github.com/opulencephp/opulencephp.com/blob/master/LICENSE.md
 */
namespace OpulenceWebsite\Console\Commands;

use Opulence\Console\Commands\Command;
use Opulence\Console\Responses\IResponse;
use OpulenceWebsite\Documentation\Api;

/**
 * Defines the command that generates API docs
 */
class ApiCommand extends Command
{
    /** @var Api The tool to generate docs */
    private $api = null;

    /**
     * @param Api $api The tool to generate API docs
     */
    public function __construct(Api $api)
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