<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;


class AdminMiddleware
{
    public function handle(Request $request, Closure $next): mixed
    {
        {
            if (!Auth::check() || Auth::user()->role !== 'admin') {
                abort(403, 'Доступ запрещён');
            }

            return $next($request);
        }
        Log::info('AdminMiddleware: Проверка роли пользователя');
        /** @var User|null $user */
        $user = auth()->user();

        if (!$user) {
            Log::info('AdminMiddleware: Пользователь не аутентифицирован');
            return redirect('/')->with('error', 'Доступ запрещен');
        }

        if (!$user->isAdmin()) {
            Log::info('AdminMiddleware: Пользователь не является администратором');
            return redirect('/')->with('error', 'Доступ запрещен');
        }

        return $next($request);
    }
}
