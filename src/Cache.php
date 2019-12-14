<?php
declare(strict_types=1);

namespace App;


class Cache
{
    /*
    Psr/SimpleCache/CacheInterface
    class Cache implement CacheInterface
    {
        //some code
    }

    */
    public function get(string $id): ?string
    {
        return 'cache data';
    }
    public function set(string $id, $data, $time): void {}
}