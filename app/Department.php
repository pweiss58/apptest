<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function location(){
        return $this->belongsTo('App\Location');
    }

    public function ticket(){
        return $this->hasMany('App\Seat');
    }
}
