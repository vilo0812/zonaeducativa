<?php

namespace App;

use App\Action;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Bitacore extends Model
{
      protected $fillable = [
       'user_id',
       'action_id',
       'details',
       'input',
    ];
    public $timestamps = false;
    //start sacamos la bitacora de el id del usuario
      public function action(){
      return $this->belongsTo(Action::class);
      }
      //end sacamos la bitacora de el id del usuario
      //start consulta que permite sacar la información especifica que se necesita para los reportes de bitacora
     public function showBitacore(int $id){
      	$bitacora = static::leftJoin("users","bitacores.user_id","=","users.id")
        ->join('actions',"bitacores.action_id","=","actions.id")
        ->orderBy('bitacores.id', 'DESC')
        ->where('users.id',$id)
        ->select('actions.action','bitacores.details','bitacores.input')
        ->paginate(30);
        return $bitacora;
      }
      //end consulta que permite sacar la información especifica que se necesita para los reportes de bitacora
      ///start scope  action
      public function scopeAction($query,$action,$id){
          return $query->where([['action','LIKE',"%$action%"],["users.id","=",$id]]);
      } 
      ///end scope action
      ///start scope  details
      public function scopeDetails($query,$details,$id){
          return $query->where([['details','LIKE',"%$details%"],["users.id","=",$id]]);
      } 
      ///end scope details
      ///start scope  input
      public function scopeInput($query,$input,$id){
          return $query->where([['input','LIKE',"%$input%"],["users.id","=",$id]]);
      } 
      ///end scope input
}
