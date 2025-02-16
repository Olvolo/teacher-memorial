<?php

namespace App\Http\Controllers;

use App\Models\Biography;
use App\Models\Category;
use Illuminate\Contracts\View\View;
class HomeController extends Controller
{
    public function index(): View
    {
        return view('home', [
            'biography' => Biography::query()->first(),
            'categories' => Category::query()->withCount('articles')->get()
        ]);
    }
}
