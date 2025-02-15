@extends('layout.app')

@section('title', 'Биография')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <article class="biography-content">
                    <h1 class="mb-4">Биография</h1>

                    @if($biography)
                        <div class="card">
                            <div class="card-body">
                                <div class="biography-text">
                                    {!! $biography->content !!}
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-info">
                            Биография готовится к публикации
                        </div>
                    @endif
                </article>

                <div class="mt-4">
                    <a href="{{ route('home') }}" class="btn btn-outline-secondary">
                        ← Вернуться на главную
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
