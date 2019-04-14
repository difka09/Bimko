<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catfeed extends Model
{
    protected $fillable = [
        'name', 'slug'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function feeds()
    {
        return $this->belongsToMany(Feed::class);
    }


}
