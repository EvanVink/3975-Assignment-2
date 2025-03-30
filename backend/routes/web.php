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
    return view('welcome', ['showHeader' => false]);
})->name('landing');

Route::get('/unauthorized', function () {
    return view('users.401', ['showHeader' => false]);
})->name('unauthorized');

Route::get('/dashboard', function () {
    $articles = Article::all();
    $user = Auth::user();
    return view('dashboard', ['articles' => $articles, 'user' => $user]);
})->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__ . '/auth.php';
// Authentication required routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/article/edit/{id}', [ArticleController::class, 'edit'])->name('edit.article');
    Route::get('/article/remove/{id}', [ArticleController::class, 'remove'])->name('remove.article');
    
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');

    Route::post('/updateUserStatus', [AdminController::class, 'updateUserStatus'])->name('updateUserStatus');
    
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');


    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/article/remove/{id}', [ArticleController::class, 'remove'])->name('remove.article');



    Route::get('/editArticle', function () {
        return view('edit_article');
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

