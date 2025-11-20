<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'index'])->name('index');

Route::get('/register', [LoginController::class, 'showRegisterForm'])->name('registerform');

Route::post('/register', [LoginController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('/login', [LoginController::class, 'authenticate']);


Route::post('/logout', [LoginController::class, 'logout']);



Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::post('/create-post', [PostController::class, 'createPost'])->name('createPost');

    Route::get('/edit-post/{post}', [PostController::class, 'editPost'])->name('editPost');

    Route::put('/edit-post/{post}', [PostController::class, 'updatePost'])->name('updatePost');

    Route::delete('/delete-post/{post}', [PostController::class, 'deletePost'])->name('deletePost');

    Route::get('/upload-image', [UserController::class, 'showUploadForm'])->name('showUploadForm');

    Route::post('/upload-image', [UserController::class, 'uploadProfileImage'])->name('uploadProfileImage');

    Route::delete('/delete-image', [UserController::class, 'deleteProfileImage'])->name('deleteProfileImage');
    });

