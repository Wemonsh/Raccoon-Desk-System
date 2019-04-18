@extends('layouts.default')

@section('content')
    <h1>Категория: {{ $category->title }}</h1>
    @forelse($news as $value)
        <div class="card mb-3">
            <div class="card-body">
                <p>{{ $value->title }}</p>
                <p><a href="/news/post/{{ $value->id }}">Подробнее</a></p>
            </div>
            <div class="card-footer text-muted">
                <span class="mr-1" title="Автор новости"><i class="fas fa-user"></i> {{ $value->last_name.' '.$value->first_name.' '.$value->middle_name }}</span>
                <span class="mr-1" title="Дата и время создания"><i class="fas fa-calendar-alt"></i> {{ $value->created_at }}</span>
                <span class="mr-1" title="Количество просмотров"><i class="fas fa-eye"></i> {{ $value->views }}</span>
            </div>
        </div>
    @empty
        <p>В данной категории нет статей</p>
    @endforelse

    {{ $news->render() }}
@endsection