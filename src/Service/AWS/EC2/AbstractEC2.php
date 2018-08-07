<?php

namespace App\Service\AWS\EC2;

use App\Service\AWS\CredentialsProvider;
use Aws\Ec2\Ec2Client;

abstract class AbstractEC2
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
        $this->client = new Ec2Client([
            'version' => 'latest',
            'region' => 'eu-west-1',
            'credentials' => $this->credentialsProvider->getCredentialsProviderFromFile()
        ]);
    }

}