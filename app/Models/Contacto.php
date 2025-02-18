<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;
    protected $table = 'tbl_contactoSolicitud';

    protected $fillable = [
        'idContacto',
        'folio',
        'correo',
        'telefonoFijo',
        'telefonoCelular',
    ];

    protected $guarded = [];
}
