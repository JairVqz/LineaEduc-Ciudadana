<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extension extends Model
{
    use HasFactory;
    protected $table = 'tbl_extensionSolicitud';

    protected $fillable = [
        'idExtensionSolicitud',
        'folio',
        'idExtensionCatalogo',
        'idArea',
    ];

    protected $guarded = [];
}
