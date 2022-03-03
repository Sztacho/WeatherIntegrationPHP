<?php

namespace Stacho\WeatherCorePhp\Dto;

use DateTime;

class Location
{
    public string $name;
    public string $country;
    public string $latitude;
    public string $longitude;
    public DateTime $localtime;
}