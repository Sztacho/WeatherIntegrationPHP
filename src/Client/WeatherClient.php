<?php

namespace Stacho\WeatherCorePhp\Client;

use GuzzleHttp\Client;

class WeatherClient implements WeatherClientInterface
{
    private array $authData;
    private Client $client;

    public function __construct(array $authData)
    {
        $this->authData = $authData;
        $this->client = new Client([
            'base_uri' => 'http://api.weatherapi.com/v1/',
        ]);
    }

    public function getCurrentWeather($data): array
    {
        return json_decode(
            $this->client->request('GET', 'current.json', [
                'query' => [
                    'key' => $this->authData['apiAppKey'],
                    'q' => $data['location'],
                    'aqi' => $data['aqi'] ? 'yes' : 'no',
                ],
            ])->getBody()->getContents(),
            true
        );
    }
}