<?php

namespace Test;

use App\HttpGeoClient;
use App\Ip;
use App\IpGeoLocationLocator;

class LocatorTest
{
    public function testSuccess(): void
    {
        $apiKey = 'sdlfjfl';
        $client = $this->createMock(HttpGeoClient::class);

        $client->method('getResponse')->willReturn(json_encode([
            'country_name' => 'United States',
            'state_prov' => 'California',
            'city' => 'Mountain View'
        ]));

        $locator = new IpGeoLocationLocator($client, $apiKey);
        $location = $locator->locate(new Ip('8.8.8.8'));

        self::assertNotNull($location);
        self::assertEquals('United States', $location->getCountry());
        self::assertEquals('California', $location->getRegion());
        self::assertEquals('Mountain View', $location->getCity());
    }

    public function testNotFound(): void
    {
        $apiKey = 'sdlfjfl';
        $client = $this->createMock(HttpGeoClient::class);

        $client->method('getResponse')->willReturn(json_encode([
            'country_name' => '-',
            'state_prov' => '-',
            'city' => '-'
        ]));

        $locator = new IpGeoLocationLocator($client, $apiKey);
        $location = $locator->locate(new Ip('127.0.0.1'));

        self::assertNull($location);
    }

}