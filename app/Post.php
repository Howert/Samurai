<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //defining relationship (secondary key stuff )
    public function category(){

        return $this->belongsTo('App\Category');
    }

    public function tags (){

        return $this->belongsToMany('App\Tag');
    }

    public function comment(){
        return $this->hasMany('App\Comment');
    }
}
