<?php

namespace App;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use Searchable;
    public function event(){
        return $this->belongsToMany('App\Event');
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();

        return array('name' => $array['name'],);
    }
}
