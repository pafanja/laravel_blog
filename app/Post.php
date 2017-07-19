<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "posts";
    protected $fillable = ['name','content','file','category_id'];
    public function comments()
    {
        return $this->hasMany('App\Comments','post_id','id');
    }
}
