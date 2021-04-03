<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'WebController@index')->name('home');

// User Login Route
Route::middleware(['prevent.if.auth'])->group(function () {
  Route::get('/login', 'Auth\LoginController@index')->name('auth.login.view');
  Route::post('/login', 'Auth\LoginController@login')->name('auth.login');
  Route::get('/register', 'Auth\RegisterController@index')->name('auth.register.view');
  Route::post('/register', 'Auth\RegisterController@register')->name('auth.register');
});
Route::get('/logout', 'Auth\LoginController@logout')->name('auth.logout');

// Admin Login Route
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
  Route::middleware(['prevent.if.auth'])->group(function () {
    Route::get('/login', 'AuthController@index')->name('admin.auth.index');
    Route::post('/login', 'AuthController@login')->name('admin.auth.login');
  });
  Route::get('/admin/logout', 'Admin\AuthController@logout')->name('admin.auth.logout');
});

// Error Route
Route::get('/errors/{code}', 'ErrorController@show')->name('errors');
