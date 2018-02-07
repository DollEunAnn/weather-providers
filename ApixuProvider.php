<?php

require_once('WeatherInterface.php');

class ApixuProvider implements WeatherInterface
{
    protected $url = 'http://api.apixu.com/v1/current.json';

    protected $key;

    public function __construct($key)
    {
        $this->key = $key;
    }

    public function getWeather($city)
    {
        $url = sprintf('%s?key=%s&q=%s', $this->url,$this->key,$city);
        var_dump($url); exit;

        $contents = json_decode(file_get_contents($url));

        return [
            'pressure' => $contents->current->pressure_in,
            'temperature' => $contents->current->temp_c,
            'humidity' => $contents->current->humidity,
        ];
    }
}
