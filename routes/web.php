<?php

use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('notes', NoteController::class);
Route::get('/', function () {
    return redirect()->route('notes.index');
});