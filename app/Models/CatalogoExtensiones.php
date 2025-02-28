<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogoExtensiones extends Model
{
    use HasFactory;
    protected $table = 'tbl_catalogoExtensiones';
    protected $fillable = [
        'idExtensionCatalogo',
        'extension',
        'nombreTitular',
        'idArea',
        'idPuesto',
    ];

    protected $guarded = [];
}
