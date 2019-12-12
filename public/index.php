<?php
declare(strict_types=1);

use App\ChainLocator;
use App\HttpGeoClient;
use App\Ip;
use App\IpGeoLocationLocator;
use App\IpInfoLocator;


$client = new HttpGeoClient();

$locator = new ChainLocator(
    new IpGeoLocationLocator($client, 'sdlfjlsdjf'),
    new IpInfoLocator($client, 'wldfnff'),
);

$location = $locator->locate(new Ip('8.8.8.8'));