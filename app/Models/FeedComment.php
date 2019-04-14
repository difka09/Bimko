<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeedComment extends Model
{
    protected $fillable = [
        'user_id','post_id','parent_id','message'
    ];

    protected $table = 'feedcomments';

    public function feed()
    {
        return $this->belongsTo(Feed::class);
    }
}
