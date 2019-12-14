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
        $key = 'location-' . $ip->getValue();
        $location = $this->cache->get($key);

        if ($location === null){
            $location = $this->next->locate($ip);
            $this->cache->set($key, $location, $this->time);
        }
        return $location;
    }

}