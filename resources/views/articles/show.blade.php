@extends('layout.app')

@section('title', $article->title)

@section('description', $article->description)

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <!-- Хлебные крошки -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('articles.index') }}">Статьи</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('categories.show', $article->category->slug) }}">{{ $article->category->name }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $article->title }}</li>
                    </ol>
                </nav>

                <article class="mb-5">
                    <header class="mb-4">
                        <h1>{{ $article->title }}</h1>
                        @if($article->description)
                            <div class="lead text-muted mb-4">
                                {{ $article->description }}
                            </div>
                        @endif
                    </header>

                    <div class="article-content">
                        {!! $article->content !!}
                    </div>
                </article>

                <div class="mt-5">
                    <a href="{{ route('articles.index') }}" class="btn btn-outline-secondary">
                        ← Вернуться к списку статей
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
