<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Principal Routes
Route::get('/', [HomeController::class, 'homePage'])->name('login');

// User routes
Route::post('/register', [UserController::class, 'register'])->middleware('guest');
Route::post('/login', [UserController::class, 'login'])->middleware('guest');
Route::post('/logout', [UserController::class, 'logout'])->middleware('loggedInCheck');

// Blog routes
Route::get('/create-post', [BlogController::class, 'showCreatePage'])->middleware('loggedInCheck');
Route::post('/create-post', [BlogController::class, 'createNewPost'])->middleware('loggedInCheck');
Route::get('/post/{post}', [BlogController::class, 'viewPost'])->middleware('loggedInCheck');

// Profile routes
Route::get('/profile/{user}', []);