<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Comment extends Model
{
    public $table = 'comment';
    
    public function userName($fid)
    {
    	return User::find($fid)->name;
    }
    public function postcomment() {
    	return $this->belongsTo('App\Post');
    }
}
