@extends('layouts.app')



@section('content')
    <p>Поиск по запросу "{{ $value }}"</p>

    @forelse($articles as $article)
        <div class="card mb-3">
            <div class="card-body">
                <p><a href="{{ route('knowledgeShow', $article['id']) }}">{{ $article['title'] }}</a> <smal>{{ $article['created_at'] }}</smal></p>
            </div>
        </div>
    @empty
        <p>Поик не дал результатов</p>
    @endforelse

    <a href="{{ route('knowledge') }}">Перейти на главную</a>
@endsection