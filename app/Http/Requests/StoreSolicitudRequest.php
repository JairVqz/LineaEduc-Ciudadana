<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSolicitudRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    /*public function rules()
    {
        return [
            'nombre' => 'required|string|max:50',
            'apellidoPaterno' => 'required|string|max:50',
            'apellidoMaterno' => 'required|string|max:50',
            'idTipoSolicitud' => 'required|exists:tipo_solicitudes,idTipoSolicitud',
            'idArea' => 'required|exists:areas,idArea',
            'idPrioridad' => 'required|exists:prioridad,idPrioridad',
            'descripcion' => 'required|string',
            'idCct' => 'required|exist:ccts,idcct'
            'idMunicipio' => 'required|exists:municipios,id',
            'idLocalidad' => 'required|exists:localidades,id',
            'direccionCct' => 'required|string|max:255',
            'nombreDirector' => 'required|string|max:255',
            'correo' => 'required|email|min:1',
            'telefonoFijo' => 'nullable|numeric|max:10',
            'telefonoCelular' => 'nullable|numeric|max:10',
        ];
    }*/
}
