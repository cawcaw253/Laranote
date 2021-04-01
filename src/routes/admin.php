<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
	Route::middleware('admin.auth')->group(function () {
		Route::get('/test', 'AuthController@test')->name('admin.test'); // for test
	});

	Route::middleware(['prevent.if.auth'])->group(function () {
		Route::get('/login', 'AuthController@index')->name('admin.auth.index');
		Route::post('/login', 'AuthController@login')->name('admin.auth.login');
	});
	Route::get('/logout', 'AuthController@logout')->name('admin.auth.logout');
});
