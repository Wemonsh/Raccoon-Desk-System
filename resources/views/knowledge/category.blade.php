@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('knowledge/show.main') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('knowledge') }}">{{ __('knowledge/show.knowledge_base') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Категория {{ $category->title }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>{{ __('knowledge/category.category') }} {{ $category->title }}</h1>
    <hr>
    @forelse($articles as $article)
        <div class="card mb-3">
            <div class="card-body">
                <p>{{ $article->title }}</p>
                <p><a href="{{ route('knowledgeShow', $article->id) }}">{{ __('knowledge/category.more') }}</a></p>
            </div>
            <div class="card-footer text-muted">
                <span class="mr-1" title="{{ __('knowledge/category.article_author') }}"><i class="fas fa-user"></i> {{ $article->last_name.' '.$article->first_name.' '.$article->middle_name }}</span>
                <span class="mr-1" title="{{ __('knowledge/category.date_create') }}"><i class="fas fa-calendar-alt"></i> {{ $article->created_at }}</span>
                <span class="mr-1" title="{{ __('knowledge/category.views_number') }}"><i class="fas fa-eye"></i> {{ $article->views }}</span>
            </div>
        </div>
    @empty
        <p>{{ __('knowledge/category.no_articles') }}</p>
    @endforelse

    {{ $articles->render() }}
@endsection