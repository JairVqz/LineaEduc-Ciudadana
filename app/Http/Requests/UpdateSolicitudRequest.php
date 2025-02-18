<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSolicitudRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nombre' => 'required|string|max:255',
            /*'apellidoPaterno' => 'required|string|max:255',
            'apellidoMaterno' => 'required|string|max:255',
            'idTipoSolicitud' => 'required|exists:tipos_solicitud,id', // Asegúrate de que los valores existan en la base de datos*/
            'idPrioridad' => 'required|exists:prioridades,id' // Lo mismo para las prioridades
            /*'descripcion' => 'nullable|string',*/
        ];
    }
}
