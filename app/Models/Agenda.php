<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Agenda extends Model
{
    use SoftDeletes;


    protected $fillable = [
        'name', 'place', 'user_id', 'file', 'start_At', 'creator', 'description'
    ];

    protected $dates = ['start_At','deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function detailAgenda()
    {
        return $this->hasOne(DetailAgenda::class);
    }

    // public function setDate($datetimepicker, $time)
    // {
    //     $this->start_At = strtotime("$datetimepicker $time");

    // }

}
