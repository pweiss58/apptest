<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function  eventsets(){
        return $this->belongsTo('App\Eventset');
    }

    public function artists(){
        return $this->belongsToMany('App\Artist');
    }

    public function locations(){
        return $this->belongsToMany('App\Location');
    }

    public function tickets(){
        return $this->hasMany('App\Ticket');
    }
}
