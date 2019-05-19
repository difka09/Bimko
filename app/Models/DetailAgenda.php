<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class DetailAgenda extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'file', 'summary', 'agenda_id', 'status',
    ];

    protected $dates = ['deleted_at'];


    public function agenda()
    {
        return $this->belongsTo(Agenda::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
