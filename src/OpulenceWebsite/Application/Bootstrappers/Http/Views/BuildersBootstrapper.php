<?php
/**
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2017 David Young
 * @license   https://github.com/opulencephp/opulencephp.com/blob/master/LICENSE.md
 */
namespace OpulenceWebsite\Application\Bootstrappers\Http\Views;

use Opulence\Http\Requests\Request;
use Opulence\Ioc\Bootstrappers\Bootstrapper;
use Opulence\Views\Factories\IViewFactory;
use Opulence\Views\IView;
use OpulenceWebsite\Application\Config\DocumentationConfig;
use OpulenceWebsite\Application\Http\Views\Builders\DocsBuilder;
use OpulenceWebsite\Application\Http\Views\Builders\HtmlErrorBuilder;
use OpulenceWebsite\Application\Http\Views\Builders\HomeBuilder;
use OpulenceWebsite\Application\Http\Views\Builders\MasterBuilder;

/**
 * Defines the view builders bootstrapper
 */
class BuildersBootstrapper extends Bootstrapper
{
    /**
     * Registers view builders to the factory
     *
     * @param IViewFactory $viewFactory The view factory to use
     * @param Request $request The current request
     * @param DocumentationConfig $documentationConfig The documentation config
     */
    public function run(IViewFactory $viewFactory, Request $request, DocumentationConfig $documentationConfig) : void
    {
        $viewFactory->registerBuilder("Master", function (IView $view) use ($request, $documentationConfig) {
            return (new MasterBuilder($request, $documentationConfig))->build($view);
        });
        $viewFactory->registerBuilder("Home", function (IView $view) {
            return (new HomeBuilder())->build($view);
        });
        $viewFactory->registerBuilder("Docs", function (IView $view) {
            return (new DocsBuilder())->build($view);
        });
        $viewFactory->registerBuilder("errors/html/Error", function (IView $view) {
            return (new HtmlErrorBuilder())->build($view);
        });
    }
}