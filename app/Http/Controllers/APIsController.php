<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class APIsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function apiMunicipios()
    {
        $url = "https://msvc.sev.gob.mx/catalogos/entidad/api/estado/30/municipio/";

        $response = Http::get($url);

        if ($response->successful()) {
            return response()->json($response->json());
        } else {
            return response()->json(['error' => 'No se pudo obtener datos de la API'], 500);
        }
    }
    public function apiLocalidades()
    {
        $url = "https://msvc.sev.gob.mx/catalogos/entidad/api/estado/30/municipio/{idMunicipio}/localidad";

        $response = Http::get($url);

        if ($response->successful()) {
            return response()->json($response->json());
        } else {
            return response()->json(['error' => 'No se pudo obtener datos de la API de localidades'], 500);
        }
    }

}
