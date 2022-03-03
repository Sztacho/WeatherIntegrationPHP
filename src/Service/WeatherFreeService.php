<?php

namespace Stacho\WeatherCorePhp\Service;


use DateTime;
use Exception;
use Stacho\WeatherCorePhp\Client\WeatherClientInterface;
use Stacho\WeatherCorePhp\Dto\Location;
use Stacho\WeatherCorePhp\Dto\Response;
use Stacho\WeatherCorePhp\Dto\Weather;
use Stacho\WeatherCorePhp\Dto\Wind;

class WeatherFreeService implements WeatherServiceInterface
{
    private WeatherClientInterface $weatherClient;

    public function __construct(WeatherClientInterface $weatherClient)
    {
        $this->weatherClient = $weatherClient;
    }

    /**
     * @throws Exception
     */
    public function get($data): Response
    {
        return $this->buildResponseObject($this->weatherClient->getCurrentWeather($data));
    }

    /**
     * @throws Exception
     */
    private function buildResponseObject(array $data): Response
    {
        $location = new Location();
        $location->country = $data['location']['country'];
        $location->name = $data['location']['name'];
        $location->latitude = $data['location']['lat'];
        $location->longitude = $data['location']['lon'];
        $location->localtime = new DateTime($data['location']['localtime']);

        $wind = new Wind();
        $wind->windKph = $data['current']['wind_kph'];
        $wind->windMph = $data['current']['wind_mph'];
        $wind->windDegree = $data['current']['wind_degree'];
        $wind->windDirection = $data['current']['wind_dir'];

        $weather = new Weather();
        $weather->celsiusTemp = $data['current']['temp_c'];
        $weather->fahrenheitTemp = $data['current']['temp_f'];
        $weather->wind = $wind;

        $response = new Response();
        $response->location = $location;
        $response->weather = $weather;

        return $response;
    }
}