<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserSettingsRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{

    // public function logout(){
    // 	Auth::logout();
    // }
 
    public function getAuthUser(Request $request)
    {
        $token = JWTAuth::getToken();
        $user = JWTAuth::toUser($token);
        if($user)
        {
            return response()->json(['user' => $user]);
        }
        
    }
    public function ChangeUserSettings(Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'required|max:50|unique:users',
        //     // 'email' => 'required|email|unique:users',
        //     // 'password' => 'required|min:4'
        //     'name2' => 'required|max:50|unique:users'
        // ]);

        $token = JWTAuth::getToken();
        $user = JWTAuth::toUser($token);
       // dd($user);
        if($user)
        {
            $user->name = Input::get('fullname');
            // $user->email = Input::get('email');
            // $user->password = bcrypt(Input::get('password'));

            $user->save();
        }
        
    }
    
    public function logout(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);
 
        try {
            JWTAuth::invalidate($request->token);
 
            return response()->json([
                'success' => true,
                'message' => 'User logged out successfully'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, the user cannot be logged out'
            ], 500);
        }
    }

}

