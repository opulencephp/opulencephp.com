<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the credentials bootstrapper
 */
namespace RDevWebsite\Bootstrappers\Authentication;
use RDev\Applications\Bootstrappers\Bootstrapper;
use RDev\Authentication\Credentials\CredentialCollection;
use RDev\Authentication\Credentials\ICredentialCollection;
use RDev\IoC\IContainer;

class Credentials extends Bootstrapper
{
    /**
     * {@inheritdoc}
     */
    public function registerBindings(IContainer $container)
    {
        $container->bind(ICredentialCollection::class, CredentialCollection::class);
    }
}