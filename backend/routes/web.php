<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('article', [ArticleController::class, 'index']);
Route::get('article/{ArticleId}', [ArticleController::class, 'show']);