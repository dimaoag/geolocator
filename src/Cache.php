<?php
declare(strict_types=1);

namespace App;


class Cache
{
    public function get(string $id){}
    public function set(string $id, $data, $time): void {}
}