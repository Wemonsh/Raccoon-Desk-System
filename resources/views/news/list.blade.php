@extends('layouts.app')

@section('content')
    <h1>Новости</h1>
    <div class="card-columns">
        @forelse($news as $value)
            <div class="card shadow-sm bg-white rounded">
                @if($value['image'] != null)
                    <img src="{{ asset('/storage/' . $value['image']) }}" class="card-img-top" alt="...">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $value['title'] }}</h5>
                    <p class="card-text">{{ $value['text'] }}</p>
                    <a href="/news/post/{{ $value['id'] }}">Подробнее</a>
                </div>
                <div class="card-footer text-muted">
                    <p class="card-text">
                        <small class="text-muted">Автор: <a href="#">{{ $value['user']['last_name'].' '.$value['user']['first_name'].' '.$value['user']['middle_name'] }}</a></small>
                    </p>
                    <p class="card-text">
                        <small class="text-muted">Дата/время: <a href="#">{{ $value['created_at'] }}</a></small>
                    </p>

                </div>
            </div>
        @empty
            <div class="alert alert-info" role="alert">
                Не опубликовано не одной новости
            </div>
        @endforelse
    </div>


    {{ $news->render() }}
@endsection