<?php

// require_once('OpenWeatherMapProvider.php');
// require_once('ApixuProvider.php'); //done
require_once('WundergroundProvider.php');
// require_once('WorldWeatherOnlineProvider.php');

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
// $weather = new Weather(new ApixuProvider('f31da72df79b45f885c30251180702'));
$weather = new Weather(new WundergroundProvider('2e93bb07a6cbea3a'));
// $weather = new Weather (new WorldWeatherOnlineProvider('941f1efbcdb343d490351154180702'));
// $weather = new Weather (new DarkSkyProvider('306d71b8667e4a7f1dfbe2158e79c5cc'));


var_dump($weather->getWeather('tokyo'));
