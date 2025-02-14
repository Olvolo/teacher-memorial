<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class CategoryController extends Controller
{

    public function index(): View
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create(): View
    {
        return view('categories.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255',
            'slug' => 'nullable|unique:categories|max:255',
            'description' => 'nullable|string',
        ]);

        Category::create($request->all());
        return redirect()->route('categories.index')->with('success', 'Категория создана');
    }

   public function show(Category $category): View
    {
        return view('categories.show', compact('category'));
    }

    public function edit(Category $category): View
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category): RedirectResponse
    {
        $request->validate([
            'name' => 'required|max:255|unique:categories,name,' . $category->id,
            'slug' => 'nullable|max:255|unique:categories,slug,' . $category->id,
            'description' => 'nullable|string',
        ]);

        $category->update($request->all());
        return redirect()->route('categories.index')->with('success', 'Категория обновлена');
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Категория удалена');
    }
}
