<?php
declare(strict_types=1);

namespace App;


class Location
{
    private $country;
    private $region;
    private $city;

    public function __construct(
        string $country,
        ?string $region,
        ?string $city
    ) {
        $this->country = $country;
        $this->region = $region;
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @return string|null
     */
    public function getRegion(): ?string
    {
        return $this->region;
    }

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }




}