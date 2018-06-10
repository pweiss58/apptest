<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eventset extends Model
{
    public function events(){
        return $this->hasMany('App\Event');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function categories(){
        return $this->belongsTo('App\Category');
    }
}
