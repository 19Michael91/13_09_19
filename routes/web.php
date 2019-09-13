<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->middleware(['auth'])->group(function () {
	Route::get('/', function () {
    	return view('admin.index');
	});
	Route::prefix('images')->group(function () {
		Route::get('/', 'ImageController@index')->name('admin.images');
		Route::post('store', 'ImageController@store')->name('admin.images.store');
		Route::delete('delete', 'ImageController@destroy')->name('admin.images.destroy');
	});

	Route::prefix('orders')->group(function () {
		Route::get('/', 'OrderController@index')->name('admin.orders');
		Route::post('store', 'OrderController@store')->name('admin.orders.store');
	});
});	

Route::get('/', 'ImageController@show')->name('images');

Route::prefix('orders')->middleware(['auth'])->group(function () {
	Route::get('/', 'OrderController@index')->name('orders');
	Route::post('store', 'OrderController@store')->name('orders.store');
});
