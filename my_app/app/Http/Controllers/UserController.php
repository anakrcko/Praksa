<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
 
class UserController extends Controller
{

    public $loginAfterSignUp = true;
 
    public function register(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
 
        if ($this->loginAfterSignUp) {
            return $this->login($request);
        }
 
        return response()->json([
            'success' => true,
            'data' => $user
        ], 200);
    }
 
    public function login(Request $request)
    {
        $input = $request->only('email', 'password');
        $jwt_token = null;
 
        if (!$jwt_token = JWTAuth::attempt($input)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password',
            ], 401);
        }
 
        return response()->json([
            'success' => true,
            'token' => $jwt_token,
        ]);
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
 
    public function getAuthUser(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);
 
        $user = JWTAuth::authenticate($request->token);
 
        return response()->json(['user' => $user]);
    }

    /*
	public function register(Request $request) 
    { 
        $validator = Validator::make($request->all(), [ 
            'name' => 'required', 
            'email' => 'required|email', 
            'password' => 'required', 
            'c_password' => 'required|same:password', 
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }
        $input = $request->all(); 
        $input['password'] = bcrypt($input['password']); 
        $user = User::create($input); 
        $success['token'] =  $user->createToken('MyApp')-> accessToken; 
        $success['name'] =  $user->name;
        return response()->json(['success'=>$success], $this-> successStatus); 
	}
	public function login(Request $request){ 
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('Password Token')-> accessToken; 
            $success['name'] = $user->name;
            $success['email'] = $user->email;
            return response()->json(['success' => $success], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }
    
	public function details(Request $request) 
    { 
        $user = Auth::user(); 
        return response()->json(['success' => $user], $this-> successStatus); 
    }
	public function logout(){
        $value = $request->bearerToken();
        $id = (new Parser())->parse($value)->getHeader('jti');
        $token = $request->user()->tokens->find($id);
        $token->revoke();

        $response = 'You have been logged out';
        return response()->json(['success' => response], 200);
     }
     */




	/*
    public function postSignUp(Request $request){

    	$this->validate($request,[
    			'email' => 'required|email|unique:users',
    			'first_name' => 'required|max:50|min:5',
    			'password' => 'required|min:4'
    	]);

    	$email = $request['email'];
    	$first_name = $request['first_name'];
    	$password =bcrypt($request['password'] );

    	$user = new User();
    	$user->email = $email;
    	$user->first_name = $first_name;
    	$user->password = $password;

    	$user->save();

    	Auth::login($user);


    	return redirect()->route('dashboard');


    }

    public function postSignIn(Request $request){

    	$this->validate($request,[
    			'email' => 'required',
    			
    			'password' => 'required'
    	]);

    	if (Auth::attempt(['email' => $request['email'],'password' => $request['password']])) {
    		return redirect() -> route('dashboard');
    	}else{
    		return redirect() -> back();
    	}
    }

    public function getLogout(){
    	Auth::logout();
    	return redirect('/') ->with(['message' => 'Successfully Logout!']);
    }

    public function getAccount(){

    	return view('account',['user' => Auth::user()]);
    }

    public function postSaveAccount(Request $request){
    		$this->validate($request,[
    			'first_name' => 'required|max:99'
    		]);

    		$user = Auth::user();
    		$user->first_name = $request['first_name'];
    		$user->update();
    		$file = $request->file('image');
    		$filename = $request['first_name'] . '-' . $user->id .'.jpg';
    		if ($file) {
    			Storage::disk('local')->put($filename, File::get($file));
    		}
    		return redirect()->route('account');

    }

    public function getUserImage($filename){
    	$file = Storage::disk('local')->get($filename);
    	return new Response($file, 200);
    }
*/
}

