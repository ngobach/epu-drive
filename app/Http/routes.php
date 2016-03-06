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
		return view('gioithieu');
	});


	// Application controllers
	Route::controller('user', 'UserController');
	Route::controller('task','TaskController');
	Route::get('home', 'HomeController@index');
	Route::get('detail/{id}','HomeController@showDetail');

	// Test page
	Route::get('test', function (){
		return view('test');
	});

	// Trang chủ
	Route::get('/', function () {
	    return view('index');
	});
});
