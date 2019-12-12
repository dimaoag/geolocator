<?php
declare(strict_types=1);

use App\ChainLocator;
use App\ErrorHandler;
use App\HttpGeoClient;
use App\Ip;
use App\IpGeoLocationLocator;
use App\IpInfoLocator;
use App\MuteLocator;


$client = new HttpGeoClient();
$errorHandler = new ErrorHandler('logger');

$locator = new ChainLocator(
    new MuteLocator(
        new IpGeoLocationLocator($client, 'sdlfjlsdjf'),
        $errorHandler
    ),
    new MuteLocator(
        new IpInfoLocator($client, 'wldfnff'),
        $errorHandler
    ),
);

$location = $locator->locate(new Ip('8.8.8.8'));