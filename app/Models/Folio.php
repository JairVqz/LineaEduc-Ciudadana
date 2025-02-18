<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folio extends Model
{
    use HasFactory;

    protected $table = 'tbl_folios';

    protected $fillable = [
        'id',
        'folio',
    ];

    protected $guarded = [];

}
