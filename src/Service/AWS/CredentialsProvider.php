<?php

namespace App\Service\AWS;

use Aws\Credentials\CredentialProvider;

class CredentialsProvider implements ICredentialsProvider
{
    public function getCredentialsProviderFromFile()
    {
        $profile = 'default';
        $path = '/home/acheron/.aws/credentials';
        $provider = CredentialProvider::ini($profile, $path);

        return CredentialProvider::memoize($provider);
    }

}