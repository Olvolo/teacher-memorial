@extends('admin.layout.app')

@section('title', 'Управление статьями')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Управление статьями</h1>
        <a href="{{ route('admin.articles.create') }}" class="btn btn-primary">Создать статью</a>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Заголовок</th>
                        <th>Категория</th>
                        <th>Дата создания</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($articles as $article)
                        <tr>
                            <td>{{ $article->id }}</td>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->category->name }}</td>
                            <td>{{ $article->created_at->format('d.m.Y H:i') }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.articles.edit', $article) }}"
                                       class="btn btn-sm btn-outline-primary">
                                        Редактировать
                                    </a>
                                    <form action="{{ route('admin.articles.destroy', $article) }}"
                                          method="POST"
                                          onsubmit="return confirm('Вы уверены?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            Удалить
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Статьи не найдены</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            {{ $articles->links() }}
        </div>
    </div>
@endsection
