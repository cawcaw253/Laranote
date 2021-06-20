<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
	// Admin Feature Route
	Route::middleware('admin.auth')->group(function () {
		Route::get('/user', 'UserController@index')->name('user.index');
		Route::post('/user/block', 'UserController@block')->name('user.block');
		Route::post('/user/activate', 'UserController@activate')->name('user.activate');

		Route::get('/tag', 'TagController@index')->name('tag.index');
		Route::post('/tag/destroy', 'TagController@destroy')->name('tag.destroy');
		Route::post('/tag/update', 'TagController@update')->name('tag.update');
	});

	// Admin Auth Route
	Route::middleware('prevent.if.auth')->group(function () {
		Route::get('/login', 'AuthController@index')->name('auth.index');
		Route::post('/login', 'AuthController@login')->name('auth.login');
	});
	Route::get('/logout', 'AuthController@logout')->name('auth.logout');
});
