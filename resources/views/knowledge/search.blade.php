@extends('layouts.default')



@section('content')
    <p>{{ __('knowledge/search.knowledge_search') }} "{{ $value }}"</p>

    @forelse($articles as $article)
        <div class="card mb-3">
            <div class="card-body">
                <p><a href="{{ route('knowledgeShow', $article['id']) }}">{{ $article['title'] }}</a> <small>{{ $article['created_at'] }}</small></p>
            </div>
        </div>
    @empty
        <p>{{ __('knowledge/search.no_results') }}</p>
    @endforelse

    <a href="{{ route('knowledge') }}">{{ __('knowledge/search.to_main') }}</a>
@endsection