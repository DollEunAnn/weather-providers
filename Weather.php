<?php

// require_once('OpenWeatherMapProvider.php');
require_once('ApixuProvider.php');

class Weather
{
    protected $provider;
    public function __construct(WeatherInterface $provider)
    {
        $this->provider = $provider;
    }

    public function getWeather($city)
    {
        return $this->provider->getWeather($city);
    }
}
// $weather = new Weather(new OpenWeatherMapProvider('9b2b73523a3466fbfd80e61b126ff827'));
$weather = new Weather(new ApixuProvider('f31da72df79b45f885c30251180702'));

var_dump($weather->getWeather('Manila'));
