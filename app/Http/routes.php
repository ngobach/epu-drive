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
	Route::post('file/{id}','HomeController@postFileMark');
	Route::get('export/{id}/links','HomeController@getListFile');
	Route::get('export/{id}/xls','HomeController@exportExcel');
	Route::get('detail/{id}/missing','HomeController@missing');
	Route::delete('file/{id?}','HomeController@deleteFile');

	// Trang chủ
	Route::get('/', function () {
	    return redirect('gioi-thieu');
	});
});
