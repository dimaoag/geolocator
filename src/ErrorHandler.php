<?php
declare(strict_types=1);

namespace App;


class ErrorHandler
{
    /*
    interface ErrorHandler
    {
        public function handle(\Exception $exception): void
    }

    class PsrLogErrorHandler implement ErrorHandler
    {
        public function __construct(Psr/Log/LoggerInterface $logger)
        public function handle(\Exception $exception): void
    }

    class YiiErrorHandlerAdapter implement ErrorHandler
    {
        public function handle(\Exception $exception): void
        {
            Yii::$app->errorHandler->handleException($exception);
        }
    }

    */


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