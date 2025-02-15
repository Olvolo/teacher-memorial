@extends('layout.app')

@section('title', 'Статьи и материалы')

@section('content')
    <div class="container">
        <h1 class="mb-4">Статьи и материалы</h1>

        @forelse($categories as $category)
            <div class="card mb-4">
                <div class="card-header">
                    <h2 class="h5 mb-0">{{ $category->name }}</h2>
                </div>
                <div class="card-body">
                    @if($category->description)
                        <p class="card-text text-muted mb-4">{{ $category->description }}</p>
                    @endif

                    @if($category->articles->count() > 0)
                        <div class="list-group list-group-flush">
                            @foreach($category->articles as $article)
                                <a href="{{ route('articles.show', $article->slug) }}"
                                   class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3">
                                    <div>
                                        <h3 class="h6 mb-1">{{ $article->title }}</h3>
                                        @if($article->description)
                                            <p class="mb-0 text-muted small">{{ Str::limit($article->description, 150) }}</p>
                                        @endif
                                    </div>
                                    <span class="ms-2">
                                    <i class="bi bi-chevron-right"></i>
                                </span>
                                </a>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted mb-0">В этой категории пока нет статей</p>
                    @endif
                </div>
            </div>
        @empty
            <div class="alert alert-info">
                Статьи пока не добавлены
            </div>
        @endforelse
    </div>
@endsection
