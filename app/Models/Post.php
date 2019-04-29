<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [
        'title','content', 'user_id', 'file_1','file_2', 'type' ,
    ];

    public function getImage1()
    {
        return asset('images/' . $this->file_1);
    }

    public function getImage2()
    {
        return asset('images/' . $this->file_2);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->latest();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
