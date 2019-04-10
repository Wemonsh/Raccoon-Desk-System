@extends('layouts.app')

@section('content')
    @forelse($articles as $article)
        <div class="card mb-3">
            <div class="card-body">
                <p><a href="{{ route('knowledgeShow', $article['id']) }}">{{ $article['title'] }}</a> <smal>{{ $article['created_at'] }}</smal></p>
            </div>
        </div>
    @empty
        <p>В данной категории нет статей</p>
    @endforelse
@endsection