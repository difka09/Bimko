<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class FeedComment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id','post_id','parent_id','message'
    ];

    protected $dates = ['deleted_at'];


    protected $table = 'feedcomments';

    public function feed()
    {
        return $this->belongsTo(Feed::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
