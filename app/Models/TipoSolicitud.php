<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoSolicitud extends Model
{
    use HasFactory;
    protected $table = 'tbl_tipoSolicitud';

    protected $fillable = [
        'idTipoSolicitud',
        'tipoSolicitud',
        'idArea',
    ];

    protected $guarded = [];
}
