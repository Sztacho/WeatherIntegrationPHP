<?php

namespace Stacho\WeatherCorePhp\Client;

interface WeatherClientInterface
{
    public function getCurrentWeather($data): array;
}