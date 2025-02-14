<?php

namespace App\Http\Controllers;

use App\Models\Biography;
use Illuminate\Contracts\View\View;

class BiographyController extends Controller
{
    public function show(): View
    {
        return view('biography.show', [
            'biography' => Biography::query()->first()
        ]);
    }
}
