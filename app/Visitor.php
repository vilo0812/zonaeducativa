<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
	protected $fillable = [
        'user_id',
        'handling_time_id',
        'ticket_id',
        'direction_id',
        'belongings',
        'observation'
	];
}
