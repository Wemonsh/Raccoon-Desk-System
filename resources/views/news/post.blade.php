@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('news/post.main') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('news') }}">{{ __('news/post.news') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('newsCategory', $news->newsCategory->id) }}">{{ $news->newsCategory->title }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $news->title }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="card mt-3">
        <div class="card-body">
            <h1>{{ $news->title }}</h1>
            @if(@getimagesize(asset('/storage/' . $news->image)))
                <img src="{{ asset('/storage/' . $news->image) }}" class="card-img-top mb-3 rounded" style="object-fit: cover; width: 500px; height: 300px;">
            @endif
            <p>{!! $news->text !!}</p>
        </div>
        <div class="card-footer text-muted">
            <span class="mr-1" title="{{ __('news/post.news_author') }}"><i class="fas fa-user"></i> <a href="#"> {{ $news->user->last_name.' '.$news->user->first_name.' '.$news->user->middle_name }}</a></span>
            <span class="mr-1" title="{{ __('news/post.date_create') }}"><i class="fas fa-calendar-alt"></i> {{ $news->created_at }}</span>
            <span class="mr-1" title="{{ __('news/post.views_number') }}"><i class="fas fa-eye"></i> {{ $news->views }}</span>
        </div>
    </div>
@endsection