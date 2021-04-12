<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::namespace('Admin')->prefix('admin')->group(function () {
	// Admin Feature Route
	Route::middleware('admin.auth')->group(function () {
		Route::get('/user', 'UserController@index')->name('admin.user.index');
		Route::post('/user/block', 'UserController@block')->name('admin.user.block');
		Route::post('/user/activate', 'UserController@activate')->name('admin.user.activate');
	});

	// Admin Auth Route
	Route::middleware('prevent.if.auth')->group(function () {
		Route::get('/login', 'AuthController@index')->name('admin.auth.index');
		Route::post('/login', 'AuthController@login')->name('admin.auth.login');
	});
	Route::get('/logout', 'AuthController@logout')->name('admin.auth.logout');
});
