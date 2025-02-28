<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CatalogoPuestos extends Model
{
    use HasFactory,  SoftDeletes;
    protected $table = 'tbl_catalogoPuestos';
    protected $fillable = [
        'idPuesto',
        'puesto',
        //'idExtensionCatalogo',
    ];
    protected $guarded = [];
}
