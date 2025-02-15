@extends('layout.app')

@section('title', 'Разделы материалов')

@section('content')
    <div class="container">
        <h1 class="mb-4">Разделы материалов</h1>

        <div class="row row-cols-1 row-cols-md-2 g-4">
            @forelse($categories as $category)
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title h5">{{ $category->name }}</h2>
                            @if($category->description)
                                <p class="card-text">{{ $category->description }}</p>
                            @endif
                            <p class="card-text">
                                <small class="text-muted">Количество статей: {{ $category->articles->count() }}</small>
                            </p>
                            <a href="{{ route('categories.show', $category->slug) }}"
                               class="btn btn-primary">Перейти к разделу</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col">
                    <div class="alert alert-info">
                        Разделы пока не созданы
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
