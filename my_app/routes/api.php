<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|


    Route::get('/tasks', 'TaskController@all')->name('tasks.all');

    Route::post('/tasks', 'TaskController@store')->name('tasks.store');

    Route::get('/tasks/{task}', 'TaskController@show')->name('tasks.show');

    Route::put('/tasks/{task}', 'TaskController@update')->name('tasks.update');

    Route::delete('/tasks/{task}', 'TaskController@destory')->name('tasks.destroy');


    Route::get($uri, $callback);
    Route::post($uri, $callback);
    Route::put($uri, $callback);
    Route::patch($uri, $callback);
    Route::delete($uri, $callback);
    Route::options($uri, $callback);

    */

   // Route::post('register', 'UserController@register');
    //Route::post('register', 'Auth\RegisterController@register');
    
   // Route::post('login', 'Auth\LoginController@login');
    //Route::post('login', array('middleware' => 'cors', 'uses' => 'Auth\LoginController@login'));

    Route::post('changeSettings', 'UserController@ChangeUserSettings');
    
    Route::group(['middleware' => 'auth:api'], function(){
        Route::post('details', 'UserController@details');
        Route::post('logout', 'UserController@logout');
    });

    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('login', function() {

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
    
    });


    Route::post('register', function() {

        $user = DB::table('users')
            ->select('*')
            ->where('email',Input::get('email'))
            ->get();

        if ($user)
        {
            return response()->json([
                'success' => false,
                'token' => 'Email already exist',
            ]);
        }
        else
        {
            $user = new User();
            $user->name = Input::get('fullname');
            $user->email = Input::get('email');
            $user->password = bcrypt(Input::get('password'));
            $user->save();
    
            return response()->json([
                'success' => true,
                //'data' => $user           //prikazuje u json sve podatke koje je uneo user
            ], 200);
        }
    
    });