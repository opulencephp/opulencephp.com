<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the template functions bootstrapper
 */
namespace Project\Bootstrappers\HTTP\Views;
use RDev\Applications\Bootstrappers\Bootstrapper;
use RDev\Views\Compilers\ICompiler;

class TemplateFunctions extends Bootstrapper
{
    /**
     * Registers template functions
     *
     * @param ICompiler $compiler The compiler to use
     */
    public function run(ICompiler $compiler)
    {
        // Generates the title HTML
        $compiler->registerTemplateFunction("rdevTitle", function($title, $doFormat = true) use ($compiler)
        {
            if($doFormat)
            {
                $title .= " | RDev";
            }

            return $compiler->executeTemplateFunction("pageTitle", [$title]);
        });
        // Generates the logo text
        $compiler->registerTemplateFunction("logo", function()
        {
            return '<span class="logo">R<span class="logo-dev">Dev</span></span>';
        });
    }
}