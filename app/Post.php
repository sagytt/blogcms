<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'title', 'contents', 'category_id', 'featured', 'slug', 'user_id',
    ];


    //Acessor Function
    public function getFeaturedAttribute($featured)
    {
        return asset($featured);
    }

    protected $dates =['deleted_at'];

    ///The Post model belongs to the category
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
