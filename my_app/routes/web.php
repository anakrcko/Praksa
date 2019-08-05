<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

Auth::routes();


Route::group(['middleware'=>'user'],function(){
	// Route::get('dashboard','UserPostController@home')->name('home');
	// Route::get('newPost','UserPostController@showNewPost');
	// Route::post('createPost','UserPostController@createPost');
	// Route::get('listPost','UserPostController@listPost');
	// Route::get('viewPost/{id}','UserPostController@viewPost');
	// Route::post('writeComment','UserPostController@writeComment');
	// Route::get('deletePost/{id}','UserPostController@deletePost');
	// Route::get('editPost/{id}','UserPostController@editPost');
    
    Route::get('dashboard','PostController@getDashboard');  //

    Route::get('delete-post/{post_id}',[
        'uses' => 'PostControler@getDeletePost',
        'as' => 'post.delete',
        'middleware' => 'auth',
    ]);
    Route::get('profile','HomeController@index');
    
    
});


// Route::get('image', 'ImageController@index');
// Route::post('save', 'ImageController@save');