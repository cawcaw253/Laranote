<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

/*
|--------------------------------------------------------------------------
| Note Routes
|--------------------------------------------------------------------------
*/

// Note Feature Route
Route::resource('notes', NoteController::class);
Route::post('/notes/search', [NoteController::class, 'search'])->name('notes.search');
