<?php

namespace Test;

use App\ChainLocator;
use App\HttpGeoClient;
use App\Ip;
use App\IpGeoLocationLocator;
use App\Location;
use App\Locator;

class ChainLocatorTest
{

    public function testSuccess(): void
    {
        $locators = [
            $this->mockLocator(null),
            $this->mockLocator($expected = new Location('Expected')),
            $this->mockLocator(null),
            $this->mockLocator(new Location('Other')),
            $this->mockLocator(null),
        ];

        $locator = new ChainLocator(...$locators);
        $actual = $locator->locate(new Ip('8.8.8.8'));

        self::assertNotNull($actual);
        self::assertEquals($expected, $actual);
    }


    private function mockLocator(?Location $location): Locator
    {
        $mock = $this->createMock(Locator::class);
        $mock->method('locate')->willReturn($location);
        return $mock;
    }

}