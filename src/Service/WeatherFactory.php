<?php

namespace Stacho\WeatherCorePhp\Service;

use Stacho\WeatherCorePhp\Client\WeatherClientInterface;
use Stacho\WeatherCorePhp\Enum\IntegrationType;

class WeatherFactory
{
    public function getService(WeatherClientInterface $weatherClient, IntegrationType $integrationType)
    {
        $service = '\Stacho\WheatherCorePhp\Service\\' . $integrationType->getValue() . 'Service.php';

        return new $service($weatherClient);
    }
}