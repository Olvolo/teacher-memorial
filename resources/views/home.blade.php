{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--    <title>Home</title>--}}
{{--</head>--}}
{{--<body>--}}
{{--<h1>Welcome to the Home Page!</h1>--}}

{{--<!-- Отображение биографии -->--}}
{{--@if($biography)--}}
{{--    <div>--}}
{{--        <h2>{{ $biography->title }}</h2>--}}
{{--        <p>{{ $biography->content }}</p>--}}
{{--    </div>--}}
{{--@else--}}
{{--    <p>No biography available.</p>--}}
{{--@endif--}}

{{--<!-- Отображение категорий -->--}}
{{--<h2>Categories</h2>--}}
{{--<ul>--}}
{{--    @foreach($categories as $category)--}}
{{--        <li>--}}
{{--            {{ $category->name }} ({{ $category->articles_count }} articles)--}}
{{--        </li>--}}
{{--    @endforeach--}}
{{--</ul>--}}
{{--</body>--}}
{{--</html>--}}


@extends('layout.app')

@section('title', 'Главная')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <!-- Приветственный блок -->
                <div class="text-center mb-5">
                    <h1 class="display-4 mb-4">Памяти Учителя</h1>
                    <p class="lead">Мемориальный сайт, посвященный памяти и наследию нашего Учителя</p>
                </div>

                <!-- Биографическая справка -->
                @if($biography)
                    <div class="card mb-5">
                        <div class="card-body">
                            <h2 class="card-title h4 mb-3">Биографическая справка</h2>
                            <div class="card-text">
                                {{ Str::limit(strip_tags($biography->content), 500) }}
                            </div>
                            <a href="{{ route('biography') }}" class="btn btn-link px-0">Читать полную биографию</a>
                        </div>
                    </div>
                @endif

                <!-- Разделы статей -->
                @if($categories->count() > 0)
                    <div class="mb-5">
                        <h2 class="h4 mb-4">Разделы трудов и материалов</h2>
                        <div class="row row-cols-1 row-cols-md-2 g-4">
                            @foreach($categories as $category)
                                <div class="col">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <h3 class="card-title h5">{{ $category->name }}</h3>
                                            @if($category->description)
                                                <p class="card-text">{{ Str::limit($category->description, 100) }}</p>
                                            @endif
                                            <p class="card-text"><small class="text-muted">Статей: {{ $category->articles_count }}</small></p>
                                            <a href="{{ route('categories.show', $category->slug) }}" class="btn btn-outline-primary btn-sm">Перейти к разделу</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
