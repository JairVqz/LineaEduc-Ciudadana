<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estatus extends Model
{
    use HasFactory;

    protected $table = 'tbl_estatus';

    protected $fillable = [
        'idEstatus',
        'estatus',
    ];

    protected $guarded = [];

}
