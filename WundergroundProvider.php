<?php

require_once('WeatherInterface.php');

class WundergroundProvider implements WeatherInterface
{
    protected $url = 'http://api.wunderground.com/api';

    protected $apiKey;

    protected $features = 'conditions';


    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function getWeather($city)
    {
        $url = sprintf("%s/%s/%s/q/jp/%s.json", $this->url, $this->apiKey, $this->features, $city);

        $contents = json_decode(file_get_contents($url));

        return [
            'pressure' => $contents->current_observation->pressure_in,
            'temperature' => $contents->current_observation->temp_c,
            'humidity' => $contents->current_observation->relative_humidity,
        ];
    }
}
