<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Models\User;
use App\Models\Article;

// API routes for React frontend. No middleware, so publicly accessible
Route::get('/article', [ArticleController::class, 'index']);
Route::get('/article/{ArticleId}', [ArticleController::class, 'show']);


Route::get('/articles', function () {
    return redirect(config('app.react_url'));
})->name('articles');

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/profile');
    }
    return view('welcome', ['showHeader' => false]);
})->name('welcome');

Route::get('/unauthorized', function () {
    return view('users.401', ['showHeader' => false]);
})->name('unauthorized');



require __DIR__ . '/auth.php';
// Authentication required routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'get'])->name('profile.edit');
    Route::get('/articles/{id}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('/articles/{id}', [ArticleController::class, 'update'])->name('articles.update');
    Route::get('/article/remove/{id}', [ArticleController::class, 'destroy'])->name('remove.article');
    
    Route::get('/create_article', [ArticleController::class, 'create'])->name('create_article');
    Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');

    Route::post('/updateUserStatus', [AdminController::class, 'updateUserStatus'])->name('updateUserStatus');
    
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');


    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    


    Route::get('/pending', function () {
        return view('users.pending');
    })->name('pending');

});

// Guest routes
Route::middleware('guest')->group(function () {
    Route::get('/index', [ArticleController::class, 'index']);
    Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [UserController::class, 'login']);
    Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register.show');
    Route::post('/register', [UserController::class, 'register'])->name('register');
});


