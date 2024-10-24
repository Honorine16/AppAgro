<?php

namespace App\Services;

use GuzzleHttp\Client;

class WeatherService
{
    protected $client;
    protected $apiKey;
    protected $apiUrl;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('DIAGNOSTIC_API_KEY');
        $this->apiUrl = env('DIAGNOSTIC_API_URL');
    }

    public function getWeather($city)
    {
        $response = $this->client->get($this->apiUrl, [
            'query' => [
                'q' => $city,
                'appid' => $this->apiKey,
                'units' => 'metric', 
            ],
        ]);

        return json_decode($response->getBody(), true);
    }
}
