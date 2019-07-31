<?php

use Illuminate\Http\Request;

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
    Route::post('register', 'UserController@register');
    Route::post('login', 'UserController@login');
    
    Route::group(['middleware' => 'auth:api'], function(){
        Route::post('details', 'UserController@details');
        Route::post('logout', 'UserController@logout');
    });
    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });
