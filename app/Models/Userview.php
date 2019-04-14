<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Permissions\HasPermissionsTrait;


class Userview extends Authenticatable
{
    use Notifiable, HasPermissionsTrait, SoftDeletes;

    protected $table = 'userview';

    protected $dates = ['deleted_at'];

}
