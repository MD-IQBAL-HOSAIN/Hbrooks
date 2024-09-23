<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpcommingAlbumImage extends Model
{
    use HasFactory;
    protected $guarded = [];

    //Accesors used for image
    public function getImageUrlAttribute($value) : string
    {
        return asset('storage/' . $value);
    }
}
