<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

// controller içinde modelin tanımlanması gerekir  - use App\Models\Slider;
    protected $fillable = [  // doldurulması zorunlu alanlar
        'background',
        'title',
        'sub_title',
        'sale',
        'link',
        'seo',
    ];



}
