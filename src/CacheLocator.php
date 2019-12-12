<?php
declare(strict_types=1);

namespace App;


class CacheLocator implements Locator
{
    private $next;
    private $cache;
    private $time;

    public function __construct(Locator $next, Cache $cache, int $time)
    {
        $this->next = $next;
        $this->cache = $cache;
        $this->time = $time;
    }

    public function locate(Ip $ip): ?Location
    {

    }

}