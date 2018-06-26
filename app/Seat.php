<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    public function department(){
        return $this->belongsTo('App\Seat');
    }

    public function ticket(){
        return $this->hasMany('App\Ticket');
    }
}
