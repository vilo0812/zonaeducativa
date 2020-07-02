<?php

namespace App;

use App\Bitacore;
use App\Rol;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
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
      'rol_id',
      'sign',
      'picture'
    ];
    protected $guarded = [];

    protected $hidden = [
     'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    static function rol(){

      return $this->belongsTo(Rol::class);

    }
    public function getJWTIdentifier()
      {
        return $this->getKey();
      }

      public function getJWTCustomClaims()
      {
        return [];
      }
      public $timestamps = false;
      //start sacamos la bitacora de el id del usuario
      public function bitacore(){
      return $this->hasMany(Bitacore::class);
      }
      //end sacamos la bitacora de el id del usuario
      ///startscope scope del name
      public function scopeFirstName($query,$name){
        $data = $query->where([['first_name','LIKE',"%$name%"],["users.rol_id","=",2]]);
        if(!$data){
          $data = $query->where([['first_name','LIKE',"%$name%"],["users.rol_id","=",4]]);
        }
          return $data;
      }
      ///end scope del name
      ///startscope scope del apellido
      public function scopeLastName($query,$name){
        $data = $query->where([['last_name','LIKE',"%$name%"],["users.rol_id","=",2]]);
        if(!$data){
          $data = $query->where([['last_name','LIKE',"%$name%"],["users.rol_id","=",4]]);
        }
          return $data;
      }
      ///end scope del apellido
      ///startscope scope del ID
      public function scopeIdentificationCard($query,$ic){
        $data = $query->where([['identification_card','LIKE',"%$ic%"],["users.rol_id","=",2]]);
        if(!$data){
          $data = $query->where([['identification_card','LIKE',"%$ic%"],["users.rol_id","=",4]]);
        }
          return $data;
      }
      ///end scope del ID
      ///startscope scope del telefono
      public function scopePhone($query,$phone){
        $data = $query->where([['phone','LIKE',"%$phone%"],["users.rol_id","=",2]]);
        if(!$data){
          $data = $query->where([['phone','LIKE',"%$phone%"],["users.rol_id","=",4]]);
        }
          return $data;
      }
      ///end scope del telefono
      ///startscope scope del email
      public function scopeEmail($query,$email){
        $data = $query->where([['email','LIKE',"%$email%"],["users.rol_id","=",2]]);
        if(!$data){
          $data = $query->where([['email','LIKE',"%$email%"],["users.rol_id","=",4]]);
        }
          return $data;
      }
      ///end scope del telefono
      ///startscope scope del email
      public function scopeRols($query,$rol){
        $data = $query->where([['rol','LIKE',"%$rol%"],["users.rol_id","=",2]]);
        if(!$data){
          $data = $query->where([['rol','LIKE',"%$rol%"],["users.rol_id","=",4]]);
        }
          return $data;
      }
      ///end scope del telefono

}
