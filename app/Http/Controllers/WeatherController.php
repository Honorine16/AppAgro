<?php

namespace App\Http\Controllers;

use App\Services\WeatherService;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    protected $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function show(Request $request)
    {
        $weather = null; 

        if ($request->has('city')) {
            $request->validate(['city' => 'required|string']);
            $weather = $this->weatherService->getWeather($request->city);
        }

        return view('menus.weather', compact('weather'));
    }
}
