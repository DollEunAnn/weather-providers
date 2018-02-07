<?php

// require_once('OpenWeatherMapProvider.php'); //done
// require_once('ApixuProvider.php'); //done
// require_once('WundergroundProvider.php'); //done

require_once('WorldWeatherOnlineProvider.php');

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
// $weather = new Weather(new OpenWeatherMapProvider('9b2b73523a3466fbfd80e61b126ff827')); //DONE
// $weather = new Weather(new ApixuProvider('f31da72df79b45f885c30251180702')); //DONE
// $weather = new Weather(new WundergroundProvider('2e93bb07a6cbea3a')); //DONE
// $weather = new Weather (new WorldWeatherOnlineProvider('941f1efbcdb343d490351154180702')); //DONE
var_dump($weather->getWeather('tokyo'));
