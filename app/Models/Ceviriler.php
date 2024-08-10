<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ceviriler extends Model
{
    use HasFactory;

    protected $fillable = [  // doldurulması zorunlu alanlar
        'const',

    ];


}
