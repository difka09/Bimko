<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Answer extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'parent', 'question_id', 'message'
    ];

    protected $dates = ['deleted_at'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
