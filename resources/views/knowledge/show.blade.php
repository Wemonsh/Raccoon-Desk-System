@extends('layouts.app')

@section('sidebar')
    <div class="card">
        <div class="card-header">Информация</div>
        <div class="card-body">
            <p>Дата создания: {{ $article['created_at'] }}</p>
            <p>Дата изменения: {{ $article['updated_at'] }}</p>
            <p>Кол-во просмотров: {{ $article['views'] }}</p>
            <p>Автор: <a href="#">{{ $article['user']['last_name'].' '.$article['user']['first_name'].' '.$article['user']['middle_name'] }}</a></p>
        </div>
    </div>
    @if($article['files'] != null)
    <div class="card mt-3">
        <div class="card-header">Приложения</div>
        <div class="card-body">
            @foreach(json_decode($article['files']) as $file)
                <p><a href="{{ asset('/storage/' . $file->path) }}">{{ $file->name }}</a></p>
            @endforeach
        </div>
    </div>
    @endif
@endsection

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('knowledge') }}">База знаний</a></li>
            <li class="breadcrumb-item"><a href="#">{{ $article['knowledge_category']['title'] }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $article['title'] }}</li>
        </ol>
    </nav>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <h1>{{ $article['title'] }}</h1>
        <hr>
        <div class="content">
            {!! $article['text'] !!}
        </div>
    </div>
</div>
@endsection