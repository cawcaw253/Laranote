<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Route::get('/', 'WebController@index')->name('home');

// Note Login Route
Route::middleware(['prevent.if.auth'])->group(function () {
  Route::get('/', 'User\AuthController@index')->name('auth.login.view');
  Route::post('/login', 'User\AuthController@login')->name('auth.login');
  Route::get('/register', 'User\AuthController@create')->name('auth.register.view');
  Route::post('/register', 'User\AuthController@store')->name('auth.register');
});
Route::get('/logout', 'User\AuthController@logout')->name('auth.logout');

Route::get('/terms-of-service', 'WebController@terms')->name('web.terms-of-service');
Route::get('/privacy-policy', 'WebController@privacy')->name('web.privacy-policy');

// Error Route
Route::get('/errors/{code}', 'ErrorController@show')->name('errors');
