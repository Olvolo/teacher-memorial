<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    public function index()
    {
        $categories = Category::with('articles')->get();
        return view('articles.index', compact('categories'));
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }
}
