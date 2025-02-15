@extends('admin.layout.app')

@section('title', 'Редактирование статьи')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="h4 mb-0">Редактирование статьи</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.articles.update', $article) }}" method="POST">
                @csrf
                @method('PUT')

                @include('admin.articles.partials.form')

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Обновить</button>
                    <a href="{{ route('admin.articles.index') }}" class="btn btn-outline-secondary">
                        Отмена
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
