<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
Route::view('/', 'index') -> name('index');
Route::resource("/user", userController::class);
