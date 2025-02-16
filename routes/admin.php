<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/articles', [ArticleController::class, 'index'])->name('articles.index');
});
