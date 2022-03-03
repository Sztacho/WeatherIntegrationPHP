<?php

namespace Stacho\WeatherCorePhp\Client;

use Stacho\WeatherCorePhp\Enum\IntegrationType;

class APIClientFactory
{
    public function getClient(array $authData, IntegrationType $integrationType)
    {
        $class = '\Stacho\WheatherCorePhp\Client\\' . $integrationType->getValue() . 'Client.php';

        return new $class($authData);
    }
}