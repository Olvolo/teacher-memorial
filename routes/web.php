<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BiographyController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\AdminController;
// Основные маршруты
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/biography', [BiographyController::class, 'show'])->name('biography');
// Статьи
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{article:slug}', [ArticleController::class, 'show'])->name('articles.show');
// Категории (для просмотра)
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category:slug}', [CategoryController::class, 'show'])->name('categories.show');
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    // Маршруты для управления статьями
    Route::resource('articles', ArticleController::class);
    // Маршруты для управления категориями
    Route::resource('categories', CategoryController::class);
    // Маршрут для управления биографией
    Route::get('biography', [BiographyController::class, 'edit'])->name('admin.biography.edit');
    Route::put('biography', [BiographyController::class, 'update'])->name('admin.biography.update');
});
// Маршруты аутентификации
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [AuthController::class, 'register']);
});
Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/articles', [ArticleController::class, 'index'])->name('articles.index');
});
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
});
