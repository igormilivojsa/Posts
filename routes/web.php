<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::resource('posts', PostController::class);
Route::resource('users', UserController::class);
Route::resource('posts/{post}/comments', CommentController::class);
Route::resource('users/{user}/follow' , FollowController::class);


Route::get('dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
