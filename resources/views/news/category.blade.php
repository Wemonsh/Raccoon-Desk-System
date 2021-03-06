@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('news/post.main') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('news') }}">{{ __('news/post.news') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Категория {{ $category->title }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>{{ __('news/category.category:') }} {{ $category->title }}</h1>
    <hr>
    @forelse($news as $value)
        <div class="card mb-3">
            <div class="card-body">
                <p>{{ $value->title }}</p>
                <p><a href="/news/post/{{ $value->id }}">{{ __('news/category.more') }}</a></p>
            </div>
            <div class="card-footer text-muted">
                <span class="mr-1" title="{{ __('news/category.news_author') }}"><i class="fas fa-user"></i> {{ $value->last_name.' '.$value->first_name.' '.$value->middle_name }}</span>
                <span class="mr-1" title="{{ __('news/category.date_create') }}"><i class="fas fa-calendar-alt"></i> {{ $value->created_at }}</span>
                <span class="mr-1" title="{{ __('news/category.views_number') }}"><i class="fas fa-eye"></i> {{ $value->views }}</span>
            </div>
        </div>
    @empty
        <p>{{ __('news/category.no_news') }}</p>
    @endforelse

    {{ $news->render() }}
@endsection