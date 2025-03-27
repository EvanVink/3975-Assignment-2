<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;


Route::get('/view.articles', function () {
    return redirect(config('app.react_url'));
})->name('view.articles');

Route::get('/id', function () {
    return redirect(config('app.recat_url'));
});

Route::get('/', function() {
    return view('welcome', ['showHeader' => false]);
});


// Public routes==================================
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/view-articles', function () {
//     return redirect(config('app.react_url'));
// })->name('view.articles');

// // Admin routes
// Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
//     Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
//     Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
//     // Other admin routes...
// });

// // User routes
// Route::middleware(['auth'])->group(function () {
//     Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
//     // Other user routes...
// });
// Public routes==================================









Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register.show');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('/pending', function () {
    return view('auth.pending');
});


Route::get('article', [ArticleController::class, 'index']);
Route::get('article/{ArticleId}', [ArticleController::class, 'show']);