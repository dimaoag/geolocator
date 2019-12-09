<?php

namespace Test;

use App\Ip;
use App\Locator;

class LocatorTest
{
    public function testSuccess(): void
    {
        $locator = new Locator();
        $location = $locator->locate(new Ip('8.8.8.8'));

        self::assertNotNull($location);
        self::assertEquals('United States', $location->getCountry());
        self::assertEquals('California', $location->getRegion());
        self::assertEquals('Mountain View', $location->getCity());
    }

    public function testNotFound(): void
    {
        $locator = new Locator();
        $location = $locator->locate(new Ip('127.0.0.1'));

        self::assertNull($location);
    }

}