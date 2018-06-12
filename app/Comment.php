<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function eventset(){
        return $this->belongsTo('App\Eventset');
    }
}
