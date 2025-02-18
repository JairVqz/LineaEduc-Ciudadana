<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class CatalogoAreas extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'tbl_catalogoAreas';
    protected $fillable = [
        'idArea',
        'area',
    ];

    protected $guarded = [];
}
