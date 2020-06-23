<?php

namespace App;

use App\DirectionTickets;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public $timestamps = false;
    public function DirectionTickets()
    {
        return $this->hasMany(DirectionTickets::class);
    }
}
