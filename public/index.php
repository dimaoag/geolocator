<?php
declare(strict_types=1);

use App\Locator;

$ip = '8.8.8.8';
$locator = new Locator();
$location = $locator->locate($ip);