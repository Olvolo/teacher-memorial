<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        /** @var User|null $user */
        $user = auth()->user();

        if (!$user || !$user->isAdmin()) {
            return redirect('/')->with('error', 'Доступ запрещен');
        }

        return $next($request);
    }
}
