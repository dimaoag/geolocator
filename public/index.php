<?php
declare(strict_types=1);

use App\ChainLocator;
use App\ErrorHandler;
use App\HttpGeoClient;
use App\Ip;
use App\IpGeoLocationLocator;
use App\IpInfoLocator;


$client = new HttpGeoClient();
$logger = 'logger';
$errorHandler = new ErrorHandler($logger);

$locator = new ChainLocator(
    $errorHandler,
    new IpGeoLocationLocator($client, 'sdlfjlsdjf'),
    new IpInfoLocator($client, 'wldfnff'),
);

$location = $locator->locate(new Ip('8.8.8.8'));