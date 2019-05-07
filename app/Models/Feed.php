<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    protected $fillable = [
        'name', 'content', 'user_id', 'file', 'slug', 'readby',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getImage()
    {
        return asset('images/' . $this->file);
    }

    public function catfeeds()
    {
        return $this->belongsToMany(Catfeed::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function feedcomments()
    {
        return $this->hasMany(FeedComment::class);
    }
}
