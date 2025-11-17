<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('home');
});



Route::get('/register', [LoginController::class, 'showRegisterForm'])->name('register');

Route::post('/register', [LoginController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('/login', [LoginController::class, 'authenticate']);


Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'dashboard'])
    ->middleware('auth')
    ->name('dashboard');

Route::post('/create-post', [PostController::class, 'createPost'])
    ->middleware('auth')
    ->name('createPost');

Route::get('/edit-post/{post}', [PostController::class, 'editPost'])
    ->middleware('auth')
    ->name('editPost');

Route::put('/edit-post/{post}', [PostController::class, 'updatePost'])
    ->middleware('auth')
    ->name('updatePost');

Route::delete('/delete-post/{post}', [PostController::class, 'deletePost'])
    ->middleware('auth')
    ->name('deletePost');

