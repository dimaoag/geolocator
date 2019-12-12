<?php
declare(strict_types=1);

namespace App;


class IpInfoLocator implements Locator
{
    private $client;
    private $apiKey;

    public function __construct(HttpGeoClient $client, string $apiKey)
    {
        $this->client = $client;
        $this->apiKey = $apiKey;
    }

    public function locate(Ip $ip): ?Location
    {
        $url = 'https://api.info-locator.com?' . http_build_query([
            'apiKey' => $this->apiKey,
            'ip' => $ip->getValue()
        ]);

        $response = $this->client->getResponse($url);
        $data = json_decode($response, true);

        if (empty($data['country_name'])){
            return null;
        }

        return new Location($data['country_name'], $data['state_prov'], $data['city']);
    }


}