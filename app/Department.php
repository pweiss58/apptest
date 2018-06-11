<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function locations(){
        return $this->belongsTo('App\Location');
    }

    public function seats(){
        return $this->hasMany('App\Seat');
    }
}
