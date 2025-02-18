<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CatalogoAreas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UsuarioController extends Controller
{

    public function index()
    {

        $listaUsuarios = User::withTrashed()->get();
        $areaUsuarios = User::withTrashed()->join('tbl_catalogoAreas', 'users.idArea', '=', 'tbl_catalogoAreas.idArea')
        ->get('tbl_catalogoAreas.area',);
        $listaAreas = CatalogoAreas::all();

        $rolUsuario = Auth::user()->rol;
        $idArea = Auth::user()->idArea;

        //dd($areaUsuarios);

        return view(
            'usuario.index',
            [
                'listaUsuarios' => $listaUsuarios,
                'listaAreas' => $listaAreas,
                'areaUsuarios' => $areaUsuarios,
            ]
        );
    }

    public function store(Request $request)
    {
        try {
            $nombre = $request->input('nombre');
            $curp = $request->input('curp');
            $email = $request->input('email');
            $rol = $request->input('rol');
            $idArea = $request->input('idArea');

            // Validar si los campos necesarios están presentes
            if (!$nombre || !$curp || !$email || !$rol || !$idArea) {
                return response()->json(['error' => 'Faltan parámetros necesarios.', $nombre, $curp, $email, $rol, $idArea], 400);
            }

            $user = new User();

            $user->name = $nombre;
            $user->curp = $curp;
            $user->email = $email;
            $user->rol = $rol;
            $user->idArea = $idArea;

            $user->save();

            return response()->json(['message' => 'Usuario registrado correctamente']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Hubo un error al registrar el usuario: ' . $e->getMessage()], 500);
        }
    }

    public function update(Request $request)
    {
        $idUser = $request->input('id');

        try {
            $user = User::findOrFail($idUser);
            $nombre = $request->input('nombre');
            $curp = $request->input('curp');
            $email = $request->input('email');
            $rol = $request->input('rol');
            $idArea = $request->input('idArea');

            $user->update([
                'name' => $nombre,
                'curp' => $curp,
                'email' => $email,
                'rol' => $rol,
                'idArea' => $idArea,
            ]);

            return response()->json(['message' => 'Usuario actualizado correctamente']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Hubo un error al actualizar el usuario: ' . $e->getMessage()], 500);
        }
    }

    public function destroy(Request $request)
    {
        $idUser = $request->input('id');

        try {
            $user = User::findOrFail($idUser);
            $user->delete();

            return response()->json(['message' => 'Usuario eliminado correctamente']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Hubo un error al eliminar el usuario: ' . $e->getMessage()], 500);
        }
    }

    public function restore(Request $request)
    {
        $idUser = $request->id;

        try {
            $user = User::withTrashed()->findOrFail($idUser);
            $user->restore();

            return response()->json(['message' => 'Usuario activado correctamente']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Hubo un error al activar el usuario: ' . $e->getMessage()], 500);
        }

    }

}