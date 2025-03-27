<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;

// Route::resource('articles', ArticleController::class);


Route::get('/', function () {
    return view('index');
});


Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register.show');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/pending', function () {
    return view('users.pending');
});


Route::get('article', [ArticleController::class, 'index']);
Route::get('article/{ArticleId}', [ArticleController::class, 'show']);