<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class WeatherServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }

    protected $client;
    protected $apiKey;
    protected $apiUrl;

    public function __construct()
    {
        // $this->client = new Client();
        $this->apiKey = env('WEATHER_API_KEY');
        $this->apiUrl = env('WEATHER_API_URL');
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
