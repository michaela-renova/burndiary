<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function(){
    $posts = [];
    if (auth()->check()){
    $posts = auth()->user()->posts()->latest()->get();
    }
    return view('dashboard', ['posts' => $posts]);
});

Route::get('/register', function() {
    return view('register');
});
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', function() {
    return view('login');
});

Route::post('/login', [AuthController::class, 'login']);


Route::post('/logout', [AuthController::class, 'logout']);

Route::post('/create-post', [PostController::class, 'createPost']);
Route::get('/edit-post/{post}', [PostController::class, 'editPost']);
Route::put('/edit-post/{post}', [PostController::class, 'updatePost']);
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);
