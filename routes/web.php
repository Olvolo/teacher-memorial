<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BiographyController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;

// Основные маршруты
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/biography', [BiographyController::class, 'show'])->name('biography');

// Статьи
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{article:slug}', [ArticleController::class, 'show'])->name('articles.show');

// Категории (для просмотра)
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category:slug}', [CategoryController::class, 'show'])->name('categories.show');
