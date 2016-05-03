<?php


Route::group(['middleware' => 'web'], function () {

    Route::auth();

	// Trang kích hoạt
	Route::get('activation', function () {
		if (!auth()->user()->actived)
	    	return view('activation');
	    return redirect('/');
	})->middleware('auth');


	// Trang giới thiệu
	Route::get('gioi-thieu', function(){
		return view('gioi_thieu');
	});


	// Application controllers
	Route::controller('user', 'UserController');
	Route::controller('task','TaskController');

	Route::get('home', 'HomeController@index');
	Route::get('detail/{id}','HomeController@showDetail');
	Route::post('detail/{id}','HomeController@postFile');
	Route::get('file/{id}','HomeController@getFile');
	Route::get('links/{id}','HomeController@getListFile');
	Route::delete('file/{id?}','HomeController@deleteFile');
	// Trang chủ
	Route::get('/', function () {
	    return view('index');
	});
});
