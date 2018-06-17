<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function  eventset(){
        return $this->belongsTo('App\Eventset');
    }

    public function artist(){
        return $this->belongsToMany('App\Artist');
    }

    public function location(){
        return $this->belongsTo('App\Location');
    }

    public function ticket(){
        return $this->hasMany('App\Ticket');
    }
}
