<?php

namespace App\Service\AWS\EC2;

use App\Service\AWS\ICredentialsProvider;
use Aws\Ec2\Ec2Client;

abstract class AbstractEC2
{
    private $credentialsProvider;

    public function __construct(ICredentialsProvider $credentialsProvider)
    {
        $this->credentialsProvider = $credentialsProvider;
    }

    protected function getClient(): Ec2Client
    {
        return new Ec2Client([
            'version' => 'latest',
            'region' => 'eu-west-1',
            'credentials' => $this->credentialsProvider->getCredentialsProviderFromFile()
        ]);
    }

}