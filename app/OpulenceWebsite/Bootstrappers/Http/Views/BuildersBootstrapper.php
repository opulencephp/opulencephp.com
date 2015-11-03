<?php
/**
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2015 David Young
 * @license   https://github.com/opulencephp/Opulence/blob/master/LICENSE.md
 */
namespace OpulenceWebsite\Bootstrappers\Http\Views;

use OpulenceWebsite\Docs\Documentation;
use OpulenceWebsite\Http\Views\Builders\DocsBuilder;
use OpulenceWebsite\Http\Views\Builders\HomeBuilder;
use OpulenceWebsite\Http\Views\Builders\MasterBuilder;
use Opulence\Applications\Bootstrappers\Bootstrapper;
use Opulence\Http\Requests\Request;
use Opulence\Views\Factories\IViewFactory;
use Opulence\Views\IView;

/**
 * Defines the view builders bootstrapper
 */
class  BuildersBootstrapper extends Bootstrapper
{
    /**
     * Registers view builders to the factory
     *
     * @param IViewFactory $viewFactory The view factory to use
     * @param Request $request The current request
     * @param Documentation $docs The docs
     */
    public function run(IViewFactory $viewFactory, Request $request, Documentation $docs)
    {
        $viewFactory->registerBuilder("Master", function (IView $view) use ($request, $docs) {
            return (new MasterBuilder($request, $docs))->build($view);
        });
        $viewFactory->registerBuilder("Home", function (IView $view) {
            return (new HomeBuilder())->build($view);
        });
        $viewFactory->registerBuilder("Docs", function (IView $view) {
            return (new DocsBuilder())->build($view);
        });
    }
}