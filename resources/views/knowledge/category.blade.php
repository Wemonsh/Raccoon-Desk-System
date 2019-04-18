@extends('layouts.app')

@section('content')
{{--    @forelse($articles as $article)--}}
{{--        <div class="card mb-3">--}}
{{--            <div class="card-body">--}}
{{--                <p><a href="{{ route('knowledgeShow', $article['id']) }}">{{ $article['title'] }}</a> <smal>{{ $article['created_at'] }}</smal></p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @empty--}}
{{--        <p>В данной категории нет статей</p>--}}
{{--    @endforelse--}}


    <h1>Категория: {{ $category->title }}</h1>
    @forelse($articles as $article)
        <div class="card mb-3">
            <div class="card-body">
                <p>{{ $article->title }}</p>
                <p><a href="{{ route('knowledgeShow', $article->id) }}">Подробнее</a></p>
            </div>
            <div class="card-footer text-muted">
                <span class="mr-1" title="Автор статьи"><i class="fas fa-user"></i> {{ $article->last_name.' '.$article->first_name.' '.$article->middle_name }}</span>
                <span class="mr-1" title="Дата и время создания"><i class="fas fa-calendar-alt"></i> {{ $article->created_at }}</span>
                <span class="mr-1" title="Количество просмотров"><i class="fas fa-eye"></i> {{ $article->views }}</span>
            </div>
        </div>
    @empty
        <p>В данной категории нет статей</p>
    @endforelse

    {{ $articles->render() }}
@endsection