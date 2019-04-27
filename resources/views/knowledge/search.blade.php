@extends('layouts.default')


@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container-fluid">
            <h1 class="display-4">{{ __('knowledge/search.knowledge_search') }}</h1>
            <form action="{{ route('knowledgeSearch') }}" method="post">
                @csrf
                <div class="input-group">
                    <input type="text" name="value" class="form-control" placeholder="{{ __('knowledge/search.request_enter') }}">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">{{ __('knowledge/search.search') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <p>{{ __('knowledge/search.request_search') }} "{{ $value }}"</p>

    @forelse($articles as $article)
        <div class="card mb-3">
            <div class="card-body">
                <p>{{ $article->title }}</p>
                <p><a href="{{ route('knowledgeShow', $article->id) }}">{{ __('knowledge/search.more') }}</a></p>
            </div>
            <div class="card-footer text-muted">
                <small><span class="mr-1" title="{{ __('knowledge/search.article_author') }}"><i class="fas fa-user"></i> {{ $article->last_name.' '.$article->first_name.' '.$article->middle_name }}</span></small>
                <small><span class="mr-1" title="{{ __('knowledge/search.date_create') }}"><i class="fas fa-calendar-alt"></i> {{ $article->created_at }}</span></small>
                <small><span class="mr-1" title="{{ __('knowledge/search.views_number') }}"><i class="fas fa-eye"></i> {{ $article->views }}</span></small>
            </div>
        </div>
    @empty
        <p>{{ __('knowledge/search.no_results') }}</p>
    @endforelse

    {{ $articles->render() }}

    <a href="{{ route('knowledge') }}">{{ __('knowledge/search.to_main') }}</a>
@endsection