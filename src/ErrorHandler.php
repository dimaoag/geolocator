<?php
declare(strict_types=1);

namespace App;


class ErrorHandler
{
    private $logger;

    public function __construct($logger)
    {
        $this->logger = $logger;
    }

    public function handle(\Exception $exception): void
    {
        $this->logger->error($exception->getMessage(), ['exception' => $exception]);
    }
}