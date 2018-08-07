<?php

namespace App\Service\AWS\EC2;

use App\Service\AWS\CredentialsProvider;
use App\Service\AWS\SES\AbstractEC2;

class Region extends AbstractEC2
{
    public function __construct(CredentialsProvider $credentialsProvider)
    {
        parent::__construct($credentialsProvider);
    }


    private function setClient()
    {

    }
}
