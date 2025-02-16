<?php

namespace App\Http\Controllers;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Contracts\View\View;
class ArticleController extends Controller
{
    public function index(): View
    {
        $categories = Category::with('articles')->get();
        return view('articles.index', compact('categories'));
    }
    public function show(Article $article): View
    {
        return view('articles.show', compact('article'));
    }
}
