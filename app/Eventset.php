<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Eventset extends Model
{

    use Searchable;
    protected $fillable = ['name', 'shortDescription', 'longDescription', 'teaserImage','bannerImage'];

    public function event(){
        return $this->hasMany('App\Event');
    }

    public function comment(){
        return $this->hasMany('App\Comment');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }


    public function toSearchableArray()
    {
        $array = $this->toArray();

        return array('name' => $array['name'],);
    }

}
