<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class auth_user extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'auth_user';
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'username', 'password', 'salt', 'status_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var arra
yf     */
    protected $hidden = [
        'password', 'salt',
    ];
}

