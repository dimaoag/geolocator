<?php
declare(strict_types=1);

namespace App;


class ChainLocator implements Locator
{
    private $locators;
    private $errorHandler;

    public function __construct(ErrorHandler $errorHandler, Locator ...$locators)
    {
        $this->errorHandler = $errorHandler;
        $this->locators = $locators;
    }

    public function locate(Ip $ip): ?Location
    {
        $result = null;
        foreach ($this->locators as $locator){
            $location = null;

            try {
                $location = $locator->locate($ip);
            } catch (\Exception $exception) {
                $this->errorHandler->handle($exception);
            }


            if ($location === null){
                continue;
            }
            if ($location->getCity() !== null){
                return $location;
            }
            if ($result === null && $location->getRegion() !== null){
                $result = $location;
                continue;
            }
            if ($result === null || $result->getRegion() === null){
                $result = $location;
            }
        }
        return $result;
    }

}