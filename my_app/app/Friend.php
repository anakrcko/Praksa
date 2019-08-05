<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Friend extends Model
{
    protected $table="friends";
    public function diaries(){
    	return $this->hasMany('App\Diary','id1','id2');
    }
    public function userName($fid)
    {
    	return User::find($fid)->name;
    }
}
