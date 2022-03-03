<?php

namespace Stacho\WeatherCorePhp\Service;

use Stacho\WeatherCorePhp\Dto\Response;

interface WeatherServiceInterface
{
    public function get($data): Response;
}