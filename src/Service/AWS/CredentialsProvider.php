<?php

namespace App\Service\AWS;

use Aws\Credentials\CredentialProvider;
use Aws\Exception\CredentialsException;
use Symfony\Component\DependencyInjection\ContainerInterface;

class CredentialsProvider implements ICredentialsProvider
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function getCredentialsProviderFromFile()
    {
        $em = $this->container->get('doctrine.orm.entity_manager');
        $settings = $em->getRepository(\App\Entity\Settings::class)->get();

        if ($settings === null) {
            $settings = new \App\Entity\Settings();
        }

        $profile = $settings->getApiCredentialsProfile();
        $path = $settings->getApiCredentialsPath();
        $provider = CredentialProvider::ini($profile, $path);

        return CredentialProvider::memoize($provider);
    }

}