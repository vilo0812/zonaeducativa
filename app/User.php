<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Tymon\JWTAuth\Contracts\JWTSubject;
class User extends Authenticatable implements JWTSubject
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
    public function getJWTIdentifier()
      {
        return $this->getKey();
      }

      public function getJWTCustomClaims()
      {
        return [];
      }
      public $timestamps = false;
}
