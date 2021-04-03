<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'WebController@index')->name('home');

// Note Login Route
Route::middleware(['prevent.if.auth'])->group(function () {
  Route::get('/login', 'Auth\LoginController@index')->name('auth.login.view');
  Route::post('/login', 'Auth\LoginController@login')->name('auth.login');
  Route::get('/register', 'Auth\RegisterController@index')->name('auth.register.view');
  Route::post('/register', 'Auth\RegisterController@register')->name('auth.register');
});
Route::get('/logout', 'Auth\LoginController@logout')->name('auth.logout');

// Error Route
Route::get('/errors/{code}', 'ErrorController@show')->name('errors');
