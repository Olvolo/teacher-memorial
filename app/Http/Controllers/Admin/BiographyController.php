<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Biography;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class BiographyController extends Controller
{
    public function edit(): View
    {
        $biography = Biography::first() ?? new Biography();
        return view('admin.biography.edit', compact('biography'));
    }
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'content' => 'required',
        ]);
        $biography = Biography::first();
        if ($biography) {
            $biography->update($validated);
        } else {
            Biography::create($validated);
        }
        return redirect()->route('admin.biography.edit')->with('success', 'Биография успешно обновлена');
    }
}
