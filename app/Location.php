<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function event(){
        return $this->belongsToMany('App\Event');
    }

    public function  user(){
        return $this->hasMany('App\User');
    }

    public function department(){
        return $this->hasMany('App\Department');
    }
}
