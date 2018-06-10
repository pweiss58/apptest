<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function eventsets(){
        return $this->belongsTo('App\Eventset');
    }
}
