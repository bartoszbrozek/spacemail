<?php

namespace App\Service\AWS\SES;

use App\Service\AWS\CredentialsProvider;
use Aws\Ses\SesClient;

abstract class AbstractSES
{
    private $credentialsProvider;
    protected $client;

    public function __construct(CredentialsProvider $credentialsProvider)
    {
        $this->credentialsProvider = $credentialsProvider;
        $this->setClient();
    }

    private function setClient()
    {
        $this->client = new SesClient([
            'version' => 'latest',
            'region' => 'eu-west-1',
            'credentials' => $this->credentialsProvider->getCredentialsProviderFromFile()
        ]);
    }

}