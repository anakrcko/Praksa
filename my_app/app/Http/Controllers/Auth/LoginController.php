<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\User;
use Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $userdata = array('email'=> Input::get('email'), 'password' => Input::get('password'));
        
        $valid = Auth::validate($userdata);
        
        if (Auth::validate($userdata))
        {
            if (Auth::attempt($userdata))
            {
                $jwt_token = JWTAuth::attempt($userdata);
                return response()->json([
                    'success' => true,
                    'token' => $jwt_token,
                ]);
            }
        }
        else
        {
            return response()->json([
                'success' => false,
                'token' => 'Error Logging In.',
            ]);
        }
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('dashboard');
        }
    }
}
