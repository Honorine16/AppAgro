<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PlantDiagnosticService
{
    protected $apiUrl;
    protected $apiKey;

    public function __construct()
    {
        $this->apiUrl = config('services.plant_diagnostic.url'); 
        $this->apiKey = config('services.plant_diagnostic.key'); 
    }

    public function diagnose($data)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
        ])->post($this->apiUrl, $data);

        return $response->json();
    }
}
