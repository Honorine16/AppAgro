<?php

namespace App\Http\Controllers;

use App\Services\DiagnosticService;
use App\Services\PlantDiagnosticService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class DiagnosticController extends Controller
{
    
    public function showForm()
    {
        return view('menus.diagnostic'); 
    }

    
    public function upload(Request $request)
    {
        // $request->validate([
        //     'plant_image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        // ]);

        // // Enregistrer l'image
        // $path = $request->file('plant_image')->store('plant_images');

        // // Appeler l'API pour obtenir des informations sur la plante
        // $response = Http::withHeaders([
        //     'Authorization' => 'Bearer ' . env('PLANT_API_KEY'), // Ajoutez votre clé API
        // ])->post(env('PLANT_API_URL'), [
        //     'image' => base64_encode(file_get_contents(storage_path('app/' . $path))),
        // ]);

        // $plantData = $response->json();

        // return view('menus.diagnostic', compact('plantData')); 

        try {
           
            $request->validate([
                'plant_image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            ]);
    
            
            $path = $request->file('plant_image')->store('plant_images');
    
            
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . env('PLANT_API_KEY'), 
            ])->post(env('PLANT_API_URL'), [
                'image' => base64_encode(file_get_contents(storage_path('app/' . $path))),
            ]);
    
            
            if ($response->successful()) {
                $plantData = $response->json();
                return view('menus.diagnostic', compact('plantData')); 
            } else {
                
                return back()->withErrors(['api_error' => 'Erreur lors de la récupération des données de la plante.']);
            }
        } catch (\Exception $e) {
            
            Log::error('Erreur lors du traitement de l\'image de la plante: ' . $e->getMessage());
            return back()->withErrors(['upload_error' => 'Une erreur est survenue lors du téléchargement de l\'image.']);
        }
    
    }
   
}
