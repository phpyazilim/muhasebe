<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = [  // doldurulması zorunlu alanlar
        'parent',
        'parentId',
        'lang',
        'baslik',
    ];


    public function ceviriler()
    {
        return $this->belongsTo(Ceviriler::class, 'parentId');
    }

    


}
