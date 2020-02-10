<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Password_recover extends Model
{
     protected $fillable = [
     	'email',
     	'token'
     ];
}
