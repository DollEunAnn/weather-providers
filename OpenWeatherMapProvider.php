<?php

require_once('WeatherInterface.php');

class OpenWeatherMapProvider implements WeatherInterface
{
    protected $url = 'http://api.openweathermap.org/data/2.5/weather';

    protected $apiKey;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function getWeather($city)
    {
        $url = sprintf('%s?q=%s&appid=%s', $this->url, $city, $this->apiKey);

        $contents = json_decode(file_get_contents($url));

        return [
            'pressure' => $contents->main->pressure,
            'temperature' => $contents->main->temp,
            'humidity' => $contents->main->humidity,
        ];
    }
}
