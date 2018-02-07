<?php

require_once('WeatherInterface.php');

class WorldWeatherOnlineProvider implements WeatherInterface
{
    protected $url = 'http://api.worldweatheronline.com/premium/v1/weather.ashx';

    protected $apiKey;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function getWeather($city)
    {

        $url = sprintf('%s?key=%s&q=%s&format=json', $this->url, $this->apiKey, $city);

        $contents = json_decode(file_get_contents($url));
        return [
            'pressure' => $contents->data->current_condition[0]->pressure,
            'temperature' => $contents->data->current_condition[0]->temp_C,
            'humidity' => $contents->data->current_condition[0]->humidity,
        ];
    }
}
