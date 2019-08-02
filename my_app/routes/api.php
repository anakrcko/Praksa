<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;

    Route::post('register', 'Auth\RegisterController@register');
    
    Route::post('login', 'Auth\LoginController@login');
    //Route::post('login', array('middleware' => 'cors', 'uses' => 'Auth\LoginController@login'));

    Route::post('changeSettings', 'UserController@ChangeUserSettings');
    
    Route::group(['middleware' => 'auth:api'], function(){
        Route::post('details', 'UserController@details');
        Route::post('logout', 'UserController@logout');
    });

    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });