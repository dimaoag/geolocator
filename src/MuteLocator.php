<?php
declare(strict_types=1);

namespace App;


class MuteLocator implements Locator
{
    private $next;
    private $handler;

    public function __construct(Locator $next, ErrorHandler $handler)
    {
        $this->next = $next;
        $this->handler = $handler;
    }

    public function locate(Ip $ip): ?Location
    {
        try {
            return $this->next->locate($ip);
        } catch (\RuntimeException $exception) {
            $this->handler->handle($exception);
            return null;
        }
    }

}