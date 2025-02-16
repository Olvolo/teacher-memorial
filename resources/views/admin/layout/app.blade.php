<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Админ-панель') - Мемориальный сайт</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <ul class="nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
               href="{{ route('home') }}">Главная</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('biography') ? 'active' : '' }}"
               href="{{ route('biography') }}">Биография</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('articles.*') ? 'active' : '' }}"
               href="{{ route('articles.index') }}">Статьи</a>
        </li>
    </ul>
    <ul class="navbar-nav">
        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Войти</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
            </li>
        @else
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                   data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    @if(Auth::user()->isAdmin())
                        <li>
                            <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                Админ-панель
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                    @endif
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="dropdown-item">Выйти</button>
                        </form>
                    </li>
                </ul>
            </li>
        @endguest
    </ul>
</nav>
{{--<nav class="navbar navbar-expand-lg navbar-dark bg-dark">--}}
{{--    <div class="container">--}}
{{--        <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Админ-панель</a>--}}
{{--        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">--}}
{{--            <span class="navbar-toggler-icon"></span>--}}
{{--        </button>--}}
{{--        <div class="collapse navbar-collapse" id="navbarNav">--}}
{{--            <ul class="navbar-nav">--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="{{ route('admin.articles.index') }}">Статьи</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="{{ route('admin.categories.index') }}">Категории</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="{{ route('admin.biography.edit') }}">Биография</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--            <ul class="navbar-nav ms-auto">--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="{{ route('home') }}">На сайт</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <form action="{{ route('logout') }}" method="POST" class="d-inline">--}}
{{--                        @csrf--}}
{{--                        <button type="submit" class="btn btn-link nav-link">Выход</button>--}}
{{--                    </form>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</nav>--}}

<main class="container py-4">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @yield('content')
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
