<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

//Redirects route to the React frontend URL defined in config/app.php.
Route::get('/articles', function () {
    return redirect(config('app.react_url'));
})->name('articles');

//Renders 'welcome' Blade(Landing page) view and hides the header.
Route::get('/', function () {
    return view('welcome', ['showHeader' => false]);
})->name('landing');

//Renders unauthorized(401 error) page and hides the header.
Route::get('/unauthorized', function () {
    return view('users.401', ['showHeader' => false]);
})->name('unauthorized');

//! Potentailly might use for nav bar
// // Admin routes
// Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
//     Route::get('/adminPage', [AdminController::class, 'dashboard'])->name('admin.dashboard');
//     Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
// });

// // User routes
// Route::middleware(['auth'])->group(function () {
//     Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
// });


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// // Route::middleware(['auth', 'admin'])->group(function () {
// // Route for updating the user approval status via form submission
// Route::post('/admin/update/status', [AdminController::class, 'updateUserStatus'])->name('updateUserStatus');
// // });

// Route::get('/dashboard', function () {
//     //passing this users variable to the view so that the admin page can display all the users
//     $users = User::all();
//     return view('admin.adminPage', ['users' => $users]);
// });


// Route::get('/profile', function () {
//     $articles = Article::all();
//     return view('common.profile', ['articles' => $articles]);
// });

Route::get('article', [ArticleController::class, 'index']);
Route::get('article/{ArticleId}', [ArticleController::class, 'show']);

Route::middleware('auth')->group(function () {


    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/article/edit/{id}', [ArticleController::class, 'edit'])->name('edit.article');
    Route::get('/article/remove/{id}', [ArticleController::class, 'remove'])->name('remove.article');
    Route::get('/article/show/{id}', [ArticleController::class, 'show'])->name('show.article');
    Route::get('/index', [ArticleController::class, 'index']);


    Route::get('/editArticle', function () {
        return view('users.edit_article');
    });


    Route::get('/pending', function () {
        return view('users.pending');
    });
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [UserController::class, 'login']);
    Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register.show');
    Route::post('/register', [UserController::class, 'register'])->name('register');
});

require __DIR__ . '/auth.php';
