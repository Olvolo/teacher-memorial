<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BiographyController;
use App\Http\Controllers\ArticleController;
use App\Models\Biography;
use App\Http\Controllers\CategoryController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/biography', [BiographyController::class, 'index']);
Route::get('/articles', [ArticleController::class, 'index']);
Route::get('/articles/{id}', [ArticleController::class, 'show']);
Route::get('/', function () {return view('welcome');});
Route::get('/biography-test', function () {return Biography::all();});
Route::resource('/categories', CategoryController::class);
