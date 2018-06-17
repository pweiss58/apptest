<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function ticket(){
        return $this->hasMany('App\Ticket');
    }

    /*public function location(){
        return $this->belongsTo('App\Location');
    }*/
}
