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
Route::domain('{account}.localhost')->group(function () {
    Route::resource('notes', NoteController::class);
});

// Image Upload Route
Route::post('/image', [ImageController::class, 'store'])->name('image.store');
