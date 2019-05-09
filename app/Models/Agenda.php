<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{

    protected $fillable = [
        'name', 'place', 'user_id', 'file', 'summary', 'start_At','status', 'creator', 'description'
    ];

    protected $dates = ['start_At'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    // public function setDate($datetimepicker, $time)
    // {
    //     $this->start_At = strtotime("$datetimepicker $time");

    // }

}
