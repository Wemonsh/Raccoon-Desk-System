@extends('layouts.default')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container-fluid">
            <h1 class="display-4">{{ __('news/search.news_search') }}</h1>
            <form action="{{ route('searchNews') }}" method="post">
                @csrf
                <div class="input-group">
                    <input type="text" name="value" class="form-control" placeholder="{{ __('news/search.request_enter') }}">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">{{ __('news/search.search') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <p>{{ __('news/search.request_search') }} "{{ $value }}"</p>

    @forelse($news as $item)
        <div class="card mb-3">
            <div class="card-body">
                <p>{{ $item['title'] }}</p>
                <p><a href="{{ 'post/'.''.$item['id'] }}">{{ __('news/search.more') }}</a></p>
            </div>
            <div class="card-footer text-muted">
                <small><span class="mr-1" title="{{ __('news/search.news_author') }}"><i class="fas fa-user"></i> {{ $item['user']['last_name'].' '.$item['user']['first_name'].' '.$item['user']['middle_name'] }}</span></small>
                <small><span class="mr-1" title="{{ __('news/search.date_create') }}"><i class="fas fa-calendar-alt"></i> {{ $item['created_at'] }}</span></small>
                <small><span class="mr-1" title="{{ __('news/search.views_number') }}"><i class="fas fa-eye"></i> {{ $item['views'] }}</span></small>
            </div>
        </div>
    @empty
        <p>{{ __('news/search.no_results') }}</p>
    @endforelse

    <a href="{{ route('news') }}">{{ __('news/search.to_main') }}</a>
@endsection