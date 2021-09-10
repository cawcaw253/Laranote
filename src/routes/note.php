<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Note Routes
|--------------------------------------------------------------------------
*/

// Note Feature Route
Route::domain('{account}.' . env('APP_DOMAIN'))
    ->middleware('set.owner.id')
    ->group(function () {
        // dd(Route::input('subdomain'));
        // Route::group(['middleware' => 'set.owner.id:' . $account], function () {
        Route::resource('notes', NoteController::class);
        // });
    });

// Image Upload Route
Route::post('/image', [ImageController::class, 'store'])->name('image.store');
