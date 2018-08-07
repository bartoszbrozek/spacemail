<?php

namespace App\Service\AWS;

interface ICredentialsProvider
{
    public function getCredentialsProviderFromFile();

}