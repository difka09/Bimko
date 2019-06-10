<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Question extends Model
{
    protected $fillable = [
        'name', 'content', 'status', 'user_id', 'parent'
    ];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
