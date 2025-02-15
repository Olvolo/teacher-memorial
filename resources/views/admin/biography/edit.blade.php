@extends('admin.layout.app')

@section('title', 'Редактирование биографии')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="h4 mb-0">Редактирование биографии</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.biography.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="content" class="form-label">Содержание</label>
                    <textarea class="form-control @error('content') is-invalid @enderror"
                              id="content"
                              name="content"
                              rows="20"
                              required>{{ old('content', $biography->content ?? '') }}</textarea>
                    @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
                        Отмена
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
