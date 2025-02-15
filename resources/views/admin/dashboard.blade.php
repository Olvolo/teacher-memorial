@php use App\Models\Article;use App\Models\Biography;use App\Models\Category; @endphp
@extends('admin.layout.app')

@section('title', 'Панель управления')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="mb-4">Панель управления</h1>
        </div>

        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Статьи</h5>
                    <p class="card-text">Всего статей: {{ Article::count() }}</p>
                    <a href="{{ route('admin.articles.index') }}" class="btn btn-primary">Управление статьями</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Категории</h5>
                    <p class="card-text">Всего категорий: {{ Category::count() }}</p>
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-primary">Управление категориями</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Биография</h5>
                    <p class="card-text">
                        Статус: {{ Biography::exists() ? 'Опубликована' : 'Не опубликована' }}</p>
                    <a href="{{ route('admin.biography.edit') }}" class="btn btn-primary">Редактировать биографию</a>
                </div>
            </div>
        </div>
    </div>
@endsection
