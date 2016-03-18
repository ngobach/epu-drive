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
	Route::delete('file/{id?}','HomeController@deleteFile');

	// Test page
	Route::get('test', function (){
		$rows = 5;
		$cols = 5;
		if (Request::has('rows')) $rows = intval(Request::input('rows'));
		if (Request::has('cols')) $cols = intval(Request::input('cols'));
		return view('test',compact(['rows','cols']));
	});

	// Trang chủ
	Route::get('/', function () {
	    return view('index');
	});
});
