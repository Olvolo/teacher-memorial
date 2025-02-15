<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ArticleController extends Controller
{
    public function index(): View
    {
        $articles = Article::with('category')->latest()->paginate(10);
        return view('admin.articles.index', compact('articles'));
    }

    public function create(): View
    {
        $categories = Category::all();
        return view('admin.articles.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'slug' => 'nullable|unique:articles|max:255',
            'description' => 'nullable|string|max:500',
        ]);

        Article::create($validated);
        return redirect()->route('admin.articles.index')->with('success', 'Статья успешно создана');
    }

    public function edit(Article $article): View
    {
        $categories = Category::all();
        return view('admin.articles.edit', compact('article', 'categories'));
    }

    public function update(Request $request, Article $article): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'slug' => 'nullable|unique:articles,slug,' . $article->id,
            'description' => 'nullable|string|max:500',
        ]);

        $article->update($validated);
        return redirect()->route('admin.articles.index')->with('success', 'Статья успешно обновлена');
    }

    public function destroy(Article $article): RedirectResponse
    {
        $article->delete();
        return redirect()->route('admin.articles.index')->with('success', 'Статья успешно удалена');
    }
}
