<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CMS extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function getImageUrlAttribute($value) : string
    {
        return asset('storage/' . $value);
    }
}
