<?php
declare(strict_types=1);

namespace App;


final class Ip
{
    private $value;

    public function __construct(string $value)
    {
        if (empty($value)){
            throw new \InvalidArgumentException('Empty IP');
        }

        if (filter_var($value, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) === false ||
            filter_var($value, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) === false
            ) {
            throw new \InvalidArgumentException('Invalid IP ' . $value);
        }

        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }



}