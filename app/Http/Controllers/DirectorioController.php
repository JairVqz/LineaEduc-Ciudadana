<?php

namespace App\Http\Controllers;
use App\Models\CatalogoPuestos;
use App\Models\CatalogoAreas;
use Illuminate\Support\Facades\DB;

use App\Models\CatalogoExtensiones;
use Illuminate\Http\Request;

class DirectorioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function collection()
    {
        $listaDirectorio  = DB::select('SELECT * FROM directorio');
        $catalogoExtensiones = CatalogoExtensiones::all();
        $listaAreas = CatalogoAreas::all();
        $listaPuestos = CatalogoPuestos::all();
        return view(
            'solicitud.directorio.directorio.directorio',
            [
                'listaDirectorio' => $listaDirectorio,
                'catalogoExtensiones'=>$catalogoExtensiones,
                'listaAreas'=>$listaAreas,
                'listaPuestos'=>$listaPuestos,
                
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $extension = $request->input('extension');
            $nombreTitular = $request->input('nombreTitular');
            $idPuesto = $request->input('idPuesto');
            $idArea = $request->input('idArea');

            // Validar si los campos necesarios están presentes
            if (!$extension || !$nombreTitular || !$idPuesto || !$idArea) {
                return response()->json(['error' => 'Faltan parámetros necesarios.', $extension, $nombreTitular, $idPuesto, $idArea], 400);
            }

            $directorio = new CatalogoExtensiones();

            $directorio->extension = $extension;
            $directorio->nombreTitular = $nombreTitular;
            $directorio->idPuesto = $idPuesto;
            $directorio->idArea = $idArea;

            $directorio->save();

            return response()->json(['message' => 'Directorio registrado correctamente']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Hubo un error al registrar el directorio: ' . $e->getMessage()], 500);
        }
    }
    public function update(Request $request)
    {
        $idExtensionCatalogo = $request->input('idExtensionCatalogo');

        try {
            $directorio = CatalogoExtensiones::where("idExtensionCatalogo","=",$idExtensionCatalogo);
            $extension = $request->input('extension');
            $nombreTitular = $request->input('nombreTitular');
            $idPuesto = $request->input('idPuesto');
            $idArea = $request->input('idArea');

            $directorio->update([
                'extension' => $extension,
                'nombreTitular' => $nombreTitular,
                'idPuesto' => $idPuesto,
                'idArea' => $idArea,
            ]);

            return response()->json(['message' => 'Directorio actualizado correctamente']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Hubo un error al actualizar el directorio: ' . $e->getMessage()], 500);
        }
    }
    public function destroy(Request $request)
    {
        $idExtensionCatalogo = $request->input('idExtensionCatalogo');

        try {
            $directorio = CatalogoExtensiones::where("idExtensionCatalogo","=",$idExtensionCatalogo);
            $directorio->delete();

            return response()->json(['message' => 'Directorio eliminado correctamente']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Hubo un error al eliminar el directorio: ' . $e->getMessage()], 500);
        }
    }

    public function restore(Request $request)
    {
        $idExtensionCatalogo = $request->idExtensionCatalogo;

        try {
            $directorio = CatalogoExtensiones::withTrashed()->where("idExtensionCatalogo","=",$idExtensionCatalogo);
            $directorio->restore();

            return response()->json(['message' => 'Directorio activado correctamente']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Hubo un error al activar el directorio: ' . $e->getMessage()], 500);
        }

    }

    public function storeDirectorioDinamico(Request $request)
    {
        try {
            $extension = $request->input('extension');
            $nombreTitular = $request->input('nombreTitular');
            $idPuesto = $request->input('idPuesto');
            $idArea = $request->input('idArea');

            // Validar si los campos necesarios están presentes
            if (!$extension || !$nombreTitular || !$idPuesto || !$idArea) {
                return response()->json(['error' => 'Faltan parámetros necesarios.', $extension, $nombreTitular, $idPuesto, $idArea], 400);
            }

            $directorio = new CatalogoExtensiones();

            $directorio->extension = $extension;
            $directorio->nombreTitular = $nombreTitular;
            $directorio->idPuesto = $idPuesto;
            $directorio->idArea = $idArea;

            $directorio->save();

            return response()->json(['message' => 'Directorio registrado correctamente']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Hubo un error al registrar el directorio: ' . $e->getMessage()], 500);
        }
    }
}