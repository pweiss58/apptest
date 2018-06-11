<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    public function departments(){
        return $this->belongsTo('App\Department');
    }
}
