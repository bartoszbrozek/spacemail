<?php

namespace App\Service\AWS\SES;

use App\Service\AWS\ICredentialsProvider;
use Aws\Ses\SesClient;

abstract class AbstractSES
{
    private $credentialsProvider;

    public function __construct(ICredentialsProvider $credentialsProvider)
    {
        $this->credentialsProvider = $credentialsProvider;
    }

    protected function getClient(): SesClient
    {
        return new SesClient([
            'version' => 'latest',
            'region' => 'eu-west-1',
            'credentials' => $this->credentialsProvider->getCredentialsProviderFromFile()
        ]);
    }

}