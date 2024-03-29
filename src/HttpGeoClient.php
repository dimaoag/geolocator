<?php
declare(strict_types=1);

namespace App;

class HttpGeoClient
{
    /*
    Psr/HttpClient/HttpClientInterface
    class HttpGeoClient implement HttpClientInterface
    {
        //code
    }
    */

    public function getResponse(string $url): ?string
    {
        $response = @file_get_contents($url);
        if ($response == false){
            throw new \RuntimeException(error_get_last());
        }
        return $response;
    }
}