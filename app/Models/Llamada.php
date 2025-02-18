<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Llamada extends Model
{
    use HasFactory;
    protected $table = 'tbl_llamadaSolicitud';

    protected $fillable = [
        'idLlamada',
        'folio',
        'horaInicio',
        'horaTermino',
        'duracionMinutos',
    ];

    protected $guarded = [];
}
