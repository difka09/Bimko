<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Permissions\HasPermissionsTrait;



class User extends Authenticatable
{
    use Notifiable, HasPermissionsTrait, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'identity', 'agency', 'grade', 'phone', 'file', 'school_id', 'nis', 'nip', 'gender'
    ];
    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getImage()
    {
        return asset('images/' . $this->file);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function feeds()
    {
        return $this->hasMany(Feed::class);
    }

    public function feedcomments()
    {
        return $this->hasMany(FeedComment::class);
    }

    public function feednotifications()
    {
        return $this->hasMany(FeedNotification::class);
    }

    public function agendas()
    {
        return $this->hasMany(Agenda::class);
    }

    public function detailAgendas()
    {
        return $this->belongsToMany(DetailAgenda::class);
    }

    public function agreements()
    {
        return $this->hasMany(Agreement::class);
    }

    public function isMurid()
    {
        return $this->hasRole('Murid');
    }
    public function isGuru()
    {
        return $this->hasRole('Guru');
    }
    public function isGuest()
    {
        return $this->hasRole('guest');
    }
    public function isAdmin()
    {
        return $this->hasRole('admin');
    }

}
