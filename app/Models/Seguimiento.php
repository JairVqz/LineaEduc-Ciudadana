<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class seguimiento extends Model
{
    use HasFactory, SoftDeletes;

    protected $table="tbl_seguimientoSolicitud";

    protected $fillable = [
        "idSeguimiento",
        "folio",
        "comentario",
        "nombre_usuario",
        "curp_usuario",
        "idArea",
    ];
    protected $guarded = [];

}
