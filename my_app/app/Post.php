<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public $table = 'post';
    
    public function post(){
    	return $this->belongsTo('App\User');
    }

    public function likes(){
    	return $this->hasMany('App\Like');
    }
}
