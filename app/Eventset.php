<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eventset extends Model
{
    public function event(){
        return $this->hasMany('App\Event');
    }

    public function comment(){
        return $this->hasMany('App\Comment');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }
}
