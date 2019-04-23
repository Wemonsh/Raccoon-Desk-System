@extends('layouts.default')

@section('content')
    <!-- TODO На данной странице логотип и название сервиса в навигации съзжает вправо!!! -->
    <h1>Новости</h1>
    <hr>
    <div class="card-columns card-columns-news">
        @forelse($news as $value)
            <div class="card shadow-sm bg-white rounded">
                @if($value['image'] != null)
                    <img src="{{ asset('/storage/' . $value['image']) }}" class="card-img-top" alt="...">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $value['title'] }}</h5>
                    {{--<p class="card-text">{{ mb_strimwidth(strip_tags($value['text']), 0, 150, '...') }}</p>--}}
                    <p class="card-text">{{ mb_strimwidth(strip_tags(str_replace('&nbsp;', ' ', $value['text'])), 0, 150, '...') }}</p>
                    <a href="/news/post/{{ $value['id'] }}">Подробнее</a>
                </div>
                <div class="card-footer text-muted">
                    <p class="card-text">
                        <small class="text-muted" title="Автор новости"><i class="fas fa-user"></i> Автор: <a href="#">{{ $value['user']['last_name'].' '.$value['user']['first_name'].' '.$value['user']['middle_name'] }}</a></small>
                    </p>
                    <p class="card-text">
                        <small class="text-muted" title="Дата и время публикации"><i class="fas fa-calendar-alt"></i> Дата/время: <a href="#">{{ $value['created_at'] }}</a></small>
                        <small class="float-right" title="Количество просмотров"><i class="fas fa-eye"></i> {{ $value['views'] }}</small>
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