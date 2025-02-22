<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CatalogoAreas;
use App\Models\CatalogoExtensiones;
use App\Models\Extension;
use App\Models\Prioridad;
use App\Models\Solicitud;
use App\Models\TipoSolicitud;
use Illuminate\Support\Facades\DB;


class DirectorioController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaExtensiones = CatalogoExtensiones::all();
        $listaAreas = CatalogoAreas::all();
        $listaTiposSolicitud = TipoSolicitud::all();
        $listaPrioridades = Prioridad::all();
        $catalogoCompleto = DB::table('catalogoCompleto')->get();

        //dd($catalogoCompleto);

        return view(
            'directorio.index',
            [
                'listaExtensiones' => $listaExtensiones,
                'listaAreas' => $listaAreas,
                'listaTiposSolicitud' => $listaTiposSolicitud, 
                'listaPrioridades' => $listaPrioridades,
                'catalogoCompleto' => $catalogoCompleto,
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
