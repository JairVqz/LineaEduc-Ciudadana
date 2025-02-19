<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    use HasFactory;

    protected $table = 'tbl_ubicacionSolicitud';

    protected $primaryKey = 'idUbicacion';

    protected $fillable = [
        'idUbicacion',
        'folio',
        'cct',
        'nivelCct',
        'nombrePlantel',
        'nombreDirector',
        'municipio',
        'localidad',
        'direccionCct',
    ];

    protected $guarded = [];
}
