<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = [

       'first_name',
       'last_name',
       'identification_card',
       'email',
      'phone',
      'password',
      'provenance',
      'rol_id'
    ];
    protected $guarded = [];

    protected $hidden = [
     'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
