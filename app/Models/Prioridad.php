<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prioridad extends Model
{
    use HasFactory;

    protected $table = 'tbl_prioridad'; 

    protected $fillable = [
        'idPrioridad',
        'prioridad',
    ];

    protected $guarded = [];

}
