<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;

    Route::post('register', 'Auth\RegisterController@register');
    
    Route::post('login', 'Auth\LoginController@login');
    //Route::post('login', array('middleware' => 'cors', 'uses' => 'Auth\LoginController@login'));

    
    // Route::group(['middleware' => 'auth:api'], function(){
    //     Route::post('details', 'UserController@details');
    //     Route::post('logout', 'UserController@logout');
    // });

    Route::post('usersettings','UserController@ChangeUserSettings');

    Route::middleware('jwt.auth')->get('users', function (){    
        return auth('api')->user();
    });