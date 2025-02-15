@extends('layout.app')

@section('title', $category->name)

@section('description', $category->description)

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Разделы</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
            </ol>
        </nav>

        <div class="row justify-content-center">
            <div class="col-md-10">
                <h1 class="mb-3">{{ $category->name }}</h1>

                @if($category->description)
                    <div class="lead text-muted mb-4">
                        {{ $category->description }}
                    </div>
                @endif

                @if($category->articles->count() > 0)
                    <div class="list-group mb-4">
                        @foreach($category->articles as $article)
                            <a href="{{ route('articles.show', $article->slug) }}"
                               class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h2 class="h5 mb-2">{{ $article->title }}</h2>
                                </div>
                                @if($article->description)
                                    <p class="mb-1 text-muted">{{ $article->description }}</p>
                                @endif
                            </a>
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-info">
                        В этом разделе пока нет статей
                    </div>
                @endif

                <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">
                    ← Вернуться к списку разделов
                </a>
            </div>
        </div>
    </div>
@endsection
