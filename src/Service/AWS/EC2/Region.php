<?php

namespace App\Service\AWS\EC2;

class Region extends AbstractEC2
{
    public function getAll(): array
    {
        $result = $this->getClient()->describeRegions()->toArray();

        $regions = [];

        foreach ($result['Regions'] as $region) {
            $regions[$region['RegionName']] = $region['RegionName'];
        }

        return $regions;
    }
}
