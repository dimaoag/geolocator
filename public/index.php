<?php
declare(strict_types=1);

use App\Cache;
use App\CacheLocator;
use App\ChainLocator;
use App\ErrorHandler;
use App\HttpGeoClient;
use App\Ip;
use App\IpGeoLocationLocator;
use App\IpInfoLocator;
use App\MuteLocator;


$client = new HttpGeoClient();
$errorHandler = new ErrorHandler('logger');
$cache = new Cache();

$locator = new CacheLocator(
    new ChainLocator(
        new MuteLocator(
            new IpGeoLocationLocator($client, 'sdlfjlsdjf'),
            $errorHandler
        ),
        new MuteLocator(
            new IpInfoLocator($client, 'wldfnff'),
            $errorHandler
        )
    ),
    $cache,
    3600
);

$location = $locator->locate(new Ip('8.8.8.8'));