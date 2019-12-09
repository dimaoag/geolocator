<?php
declare(strict_types=1);

use App\HttpGeoClient;
use App\Ip;
use App\Locator;


$apiKey = 'sdfjljfsdf';
$client = new HttpGeoClient();

$locator = new Locator($client, $apiKey);
$location = $locator->locate(new Ip('8.8.8.8'));