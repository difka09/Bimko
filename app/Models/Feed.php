<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Feed extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'content', 'user_id', 'file', 'slug', 'readby', 'status'
    ];

    protected $dates = ['deleted_at'];


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
    public function agreement()
    {
        return $this->hasOne(Agreement::class);
    }
}
