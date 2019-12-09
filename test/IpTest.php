<?php

namespace Test;

use App\Ip;

class IpTest
{
    public function testIp4(): void
    {
        $value = '8.8.8.8';
        $ip = new Ip($value);

        self::assertEquals($value, $ip->getValue());
    }

    public function testIp6(): void
    {
        $value = '8:8:8:8:8:8';
        $ip = new Ip($value);

        self::assertEquals($value, $ip->getValue());
    }


    public function testInvalid(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new Ip('Incorrect');
    }

    public function testEmpty(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new Ip('');
    }
}