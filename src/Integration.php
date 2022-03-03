<?php

namespace Stacho\WeatherCorePhp;

use Stacho\WeatherCorePhp\Client\APIClientFactory;
use Stacho\WeatherCorePhp\Dto\Response;
use Stacho\WeatherCorePhp\Enum\IntegrationType;
use Stacho\WeatherCorePhp\Service\WeatherFactory;
use Stacho\WeatherCorePhp\Service\WeatherServiceInterface;

class Integration
{
    private WeatherServiceInterface $weatherService;

    public function __construct(array $authData, IntegrationType $integrationType)
    {
        $client = (new APIClientFactory())->getClient($authData, $integrationType);
        $this->weatherService = (new WeatherFactory())->getService($client, $integrationType);
    }

    public function getWeather($data): Response
    {
        return $this->weatherService->get($data);
    }
}