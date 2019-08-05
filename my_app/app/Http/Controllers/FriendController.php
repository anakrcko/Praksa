<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class FriendController extends Controller
{
    public function getIndex() {
    	$friends = Auth::user()->friends();
    	return view('friend.index');
    }
}
