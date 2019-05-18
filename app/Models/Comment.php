<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'post_id','message','user_id', 'parent_id',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function notifications()
    {
        return $this->morphTo();
    }


    // protected static function boot()
    // {

    // parent::boot();
    // static::deleting(function ($comment){
    //     $comment->notifications()->delete();

    // });
    // }
}
