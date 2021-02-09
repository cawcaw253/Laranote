<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

/*
|--------------------------------------------------------------------------
| Note Routes
|--------------------------------------------------------------------------
*/

Route::resource('notes', NoteController::class);
