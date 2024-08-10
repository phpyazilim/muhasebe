<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ayarlar extends Model
{
    use HasFactory;

     protected $fillable = [  // doldurulması zorunlu alanlar
         'value',
         'item',
     ];


}
