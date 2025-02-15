<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Памяти Учителя') - Мемориальный сайт</title>
    <meta name="description" content="@yield('description', 'Мемориальный сайт, посвященный памяти Учителя')">

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<header class="py-3 mb-4 border-bottom">
    <div class="container d-flex flex-wrap justify-content-center">
        <a href="{{ route('home') }}" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
            <span class="fs-4">Памяти Учителя</span>
        </a>
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
        </nav>
    </div>
</header>

<main class="container py-4">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')
</main>

<footer class="footer mt-auto py-3 bg-light">
    <div class="container">
        <div class="text-center">
            <p class="mb-1">&copy; {{ date('Y') }} Памяти Учителя</p>
        </div>
    </div>
</footer>

<!-- JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
