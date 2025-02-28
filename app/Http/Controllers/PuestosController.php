<?php

namespace App\Http\Controllers;

use App\Models\CatalogoPuestos;
use Illuminate\Http\Request;

class PuestosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function puestos()
    {
        $listaPuestos = CatalogoPuestos::withTrashed()->get();
        
        return view(
            'solicitud.directorio.puestos.puestos',
            [
                'listaPuestos' => $listaPuestos,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $nuevoPuesto = $request->input('puesto');
            $puesto = new CatalogoPuestos();
            $puesto->puesto = $nuevoPuesto;
            $puesto->save();
            return response()->json(['message' => 'Puesto registrado correctamente']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Hubo un error al registrar el puesto: ' . $e->getMessage()], 500);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $idPuesto = $request->input('idPuesto');

        try {
            $puesto = CatalogoPuestos::where('idPuesto','=',$idPuesto);
            $puestoNuevo = $request->input('puesto');
            

            $puesto->update([
                'puesto' => $puestoNuevo,
            ]);

            return response()->json(['message' => 'Puesto actualizado correctamente']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Hubo un error al actualizar el puesto: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $idPuesto = $request->input('idPuesto');

        try {
            $puesto = CatalogoPuestos::where('idPuesto','=',$idPuesto);
            $puesto->delete();

            return response()->json(['message' => 'Puesto eliminado correctamente']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Hubo un error al eliminar el puesto: ' . $e->getMessage()], 500);
        }
    }

    public function restore(Request $request)
    {
        $idPuesto = $request->idPuesto;

        try {
            $puesto = CatalogoPuestos::withTrashed()->where('idPuesto','=',$idPuesto);
            $puesto->restore();

            return response()->json(['message' => 'Puesto reactivado correctamente']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Hubo un error al reactivar el puesto: ' . $e->getMessage()], 500);
        }

    }
}
