<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\userController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactSubmissionController;;

Route::resource("/comment",CommentController::class);
Route::resource("/users", userController::class);
Route::resource("/contact-submissions", ContactSubmissionController::class);
