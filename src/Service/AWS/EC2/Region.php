<?php

namespace App\Service\AWS\EC2;

use Aws\Exception\CredentialsException;

class Region extends AbstractEC2
{
    public function getAll(): array
    {
        try {
            $result = $this->getClient()->describeRegions()->toArray();

            $regions = [];

            foreach ($result['Regions'] as $region) {
                $regions[$region['RegionName']] = $region['RegionName'];
            }

            return $regions;
        } catch (CredentialsException $ex) {
            return ['default' => 'default'];
        }

    }
}
