<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use Searchable;
    public function event(){
        return $this->hasMany('App\Event');
    }

    /*public function  user(){
        return $this->hasMany('App\User');
    }*/

    public function department(){
        return $this->hasMany('App\Seat');
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();

        return array('city' => $array['city'],);
    }
}
