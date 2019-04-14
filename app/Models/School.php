<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
        'name', 'slug', 'address', 'latitude', 'longitude', 'description', 'image'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getImage()
    {
        return asset('images/' . $this->image);
    }

}
