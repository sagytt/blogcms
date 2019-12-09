<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    ///The Post model belongs to the category
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
