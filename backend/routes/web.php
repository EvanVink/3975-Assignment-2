<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Models\User;
use App\Models\Article;


Route::get('/articles', function () {
    return redirect(config('app.react_url'));
})->name('articles');

Route::get('/', function () {
    return view('welcome', ['showHeader' => false]);
})->name('welcome');

Route::get('/unauthorized', function () {
    return view('users.401', ['showHeader' => false]);
})->name('unauthorized');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__ . '/auth.php';
// Authentication required routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::post('/updateUserStatus', [AdminController::class, 'updateUserStatus'])->name('updateUserStatus');
    
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');


    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/article/edit/{id}', [ArticleController::class, 'edit'])->name('edit.article');
    Route::get('/article/remove/{id}', [ArticleController::class, 'remove'])->name('remove.article');

    Route::get('/editArticle', function () {
        return view('users.edit_article');
    });
});
// Guest routes
Route::middleware('guest')->group(function () {
    Route::get('/index', [ArticleController::class, 'index']);
    Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [UserController::class, 'login']);
    Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register.show');
    Route::post('/register', [UserController::class, 'register'])->name('register');
});

Route::get('/pending', function () {
    return view('users.pending');
})->name('pending');

