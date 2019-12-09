<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    ///You have many categories so use hasMany
    public function posts(){
        return $this->hasMany('App\Post');
    }
}
