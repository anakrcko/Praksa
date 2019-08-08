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
    Route::post('dashboard','PostController@getDashboard'); 
    
    Route::post('dashboard/profile','UserController@getAuthUser');
    Route::post('delete','PostController@getDeletePost'); 
    
    Route::post('image', 'FileController@saveFile');
    Route::post('logout', 'UserController@logout');
    Route::post('like', 'LikeController@like');
    Route::post('comment', 'CommentController@comments');


    Route::middleware('jwt.auth')->get('users', function (){    
        return auth('api')->user();
    });