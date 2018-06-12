<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function eventset(){
        return $this->hasMany('App\Eventset');
    }
}
