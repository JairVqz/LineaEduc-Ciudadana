<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CatalogoAreas;
use App\Models\CatalogoExtensiones;
use App\Models\Prioridad;
use App\Models\Solicitud;
use App\Models\TipoSolicitud;
use Illuminate\Support\Facades\DB;


class CatalogosController extends Controller
{

    //CATALOGOS
    public function catalogos()
    {
        $solicitud = new Solicitud();
        $listaTiposSolicitud = TipoSolicitud::all();
        $listaAreas = CatalogoAreas::all();
        $listaExtensiones = CatalogoExtensiones::all();
        $extensiones = $solicitud->catalogoExtension();
        $listaPrioridades = Prioridad::all();
        $tipoS = $solicitud->catalogoTipoS();
        $catalogo = $solicitud->catalogoCompleto();

        return view(
            'solicitud.catalogos.catalogos',
            [
                'listaAreas' => $listaAreas,
                'listaTiposSolicitud' => $listaTiposSolicitud,
                'listaExtensiones' => $listaExtensiones,
                'extensiones' => $extensiones,
                'listaPrioridades' => $listaPrioridades,
                'tipoS' => $tipoS,
                'catalogo' => $catalogo
            ]
        );
    }
    public function agregarArea(Request $request)
    {
        $request->validate(
            [
                'area' => 'required|unique:tbl_catalogoAreas,area', // Cambia "areas" por el nombre correcto de tu tabla y "nombre" por el campo correcto
            ],
            [
                'area.required' => 'Ingrese el área',
                'area.unique' => 'El área ya existe',
            ]
        );
        $nuevaArea = new CatalogoAreas();
        $nuevaArea->area = $request->area;
        $nuevaArea->save();
        return response()->json([
            'status' => 'success',

        ]);
    }


    public function editarArea(Request $request)
    {
        $request->validate([
            'e_area' => 'required|unique:tbl_catalogoAreas,area,' . $request->e_idArea . ',idArea',
        ], [
            'e_area.required' => 'Rellene correctamente el formulario.',
            'e_area.unique' => 'El área que intenta ingresar ya existe.',
        ]);

        CatalogoAreas::where('idArea', $request->e_idArea)->update([
            'area' => $request->e_area
        ]);

        return response()->json([
            'status' => 'success',
        ]);
    }

    public function obtenerAreas()
    {
        $areas = CatalogoAreas::all(); // Asegúrate de importar el modelo adecuado
        return response()->json(['areas' => $areas]);
    }

    public function agregarExtension(Request $request)
    {
        $request->validate(
            [
                'extension' => 'required:tbl_catalogoExtensiones', // Cambia "areas" por el nombre correcto de tu tabla y "nombre" por el campo correcto
                'idArea' => 'required'
            ],
            [
                'extension.required' => 'Ingrese la extensión',
                'idArea.required' => 'Seleccione el área a la que pertenece la extensión',
            ]
        );
        $nuevaExtension = new CatalogoExtensiones();
        $nuevaExtension->extension = $request->extension;
        $nuevaExtension->idArea = $request->idArea;
        $nuevaExtension->save();
        return response()->json([
            'status' => 'success',
        ]);
    }

    public function agregarTipoS(Request $request)
    {
        $request->validate(
            [
                'tipoSolicitud' => 'required:tbl_tipoSolicitud,tipoSolicitud', // Cambia "areas" por el nombre correcto de tu tabla y "nombre" por el campo correcto
                'idAreaT' => 'required:tbl_tipoSolicitud,idArea',
                'idPrioridad' => 'required:tbl_tipoSolicitud,idPrioridad',
            ],
            [
                'tipoSolicitud.required' => 'Ingrese el tipo de solicitud',
                'idAreaT.required' => 'Seleccione el área a la que pertenece la extensión',
                'idPrioridad.required' => 'Seleccione la prioridad de la solicitud',
            ]
        );
        $nuevoTipoS = new TipoSolicitud();
        $nuevoTipoS->tipoSolicitud = $request->tipoSolicitud;
        $nuevoTipoS->idArea = $request->idAreaT;
        $nuevoTipoS->idPrioridad = $request->idPrioridad;
        $nuevoTipoS->save();
        return response()->json([
            'status' => 'success',

        ]);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
