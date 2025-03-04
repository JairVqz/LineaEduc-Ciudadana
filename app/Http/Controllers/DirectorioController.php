<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\CatalogoExtensiones;
use App\Models\CatalogoAreas;
use App\Models\CatalogoPuestos;
use App\Models\TipoSolicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

        return view(
            'solicitud.directorio.directorio',
            [
                'listaDirectorio' => $listaDirectorio,

            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Log::info("entro: " . $request->input('idNuevaExtension') . $request->input('nuevaExtension') . $request->input('nuevoFuncionario') .
        $request->input('idNuevaArea') . $request->input('nuevaArea') .
        $request->input('idNuevoPuesto') . $request->input('nuevoPuesto') .
        $request->input('idNuevoTipoSolicitud') . $request->input('nuevoTipoSolicitud') );
        DB::beginTransaction();

        try {

            $idExtension = $request->input('idNuevaExtension');
            $idArea = $request->input('idNuevaArea');
            $idPuesto = $request->input('idNuevoPuesto');
            $idTipoSolicitud = $request->input('idNuevoTipoSolicitud');

            //NUEVOS CATÁLOGOS
            if ($idArea == "otro") {

                $areaCatalogo = new CatalogoAreas();
                $areaCatalogo->area = $request->input('nuevaArea');
                $areaCatalogo->save();

                $areaCatalogoGuardada = CatalogoAreas::where('area', $request->input('nuevaArea'))->first();

                $idArea = $areaCatalogoGuardada->idArea;

            }

            if ($idPuesto == "otro") {

                $puestoCatalogo = new CatalogoPuestos();
                $puestoCatalogo->puesto = $request->input('nuevoPuesto');
                $puestoCatalogo->save();

                $puestoCatalogoGuardado = CatalogoPuestos::where('puesto', $request->input('nuevoPuesto'))->first();

                $idPuesto = $puestoCatalogoGuardado->idPuesto;

            }

            if ($idExtension == "otro") {

                $extensionCatalogo = new CatalogoExtensiones();
                $extensionCatalogo->extension = $request->input('nuevaExtension');
                $extensionCatalogo->nombreTitular = $request->input('nuevoFuncionario');
                $extensionCatalogo->idArea = $areaCatalogoGuardada->idArea;
                $extensionCatalogo->idPuesto = $puestoCatalogoGuardado->idPuesto;
                $extensionCatalogo->save();

                $extensionCatalogoGuardada = CatalogoExtensiones::where('extension', '=', $request->input('nuevaExtension'))->first();

                $idExtension = $extensionCatalogoGuardada->idExtensionCatalogo;

            }

            if ($idTipoSolicitud == "otro") {

                $tipoSolicitudCatalogo = new TipoSolicitud();
                $tipoSolicitudCatalogo->tipoSolicitud = $request->input('nuevoTipoSolicitud');
                $tipoSolicitudCatalogo->idArea = $areaCatalogoGuardada->idArea;
                $tipoSolicitudCatalogo->idPrioridad = 2;
                $tipoSolicitudCatalogo->save();

                $tipoSolicitudCatalogoGuardada = TipoSolicitud::where('tipoSolicitud', $request->input('nuevoTipoSolicitud'))->first();

                $idTipoSolicitud = $tipoSolicitudCatalogoGuardada->idTipoSolicitud;

            }

            DB::commit();

            return response()->json(['mensaje' => 'directorio guardado correctamente', 'idArea' => $idArea,
                                    'idPuesto' => $idPuesto, 'idExtension' => $idExtension, 'idTipoSolicitud' => $idTipoSolicitud]);
        } catch (\Exception $e) {

            Log::error('Error al guardar el directorio: ' . $e->getMessage(), [
                'exception' => $e,
                'trace' => $e->getTraceAsString()
            ]);

            DB::rollBack();
            return response()->json(['mensaje' => 'Error al guardar el directorio']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
