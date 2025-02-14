@extends('layouts.app') <!-- Если у вас есть основной шаблон -->

@section('content')
    <h1>Список категорий</h1>

    @if ($categories->isEmpty())
        <p>Категорий пока нет.</p>
    @else
        <ul>
            @foreach ($categories as $category)
                <li>
                    <a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a>
                    - {{ $category->description }}
                </li>
            @endforeach
        </ul>
    @endif

    <a href="{{ route('categories.create') }}">Создать новую категорию</a>
@endsection
