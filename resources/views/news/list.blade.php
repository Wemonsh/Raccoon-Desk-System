@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-9">
            <h1>{{ __('news/list.news') }}</h1>
        </div>
        <div class="col-3 mt-3">
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
    <hr>
    <div class="card-columns card-columns-news">
        @forelse($news as $value)
            <div class="card shadow-sm bg-white rounded">
                @if(@getimagesize(asset('/storage/' . $value['image'])))
                    <img src="{{ asset('/storage/' . $value['image']) }}" class="card-img-top" alt="{{ __('news/list.no_image') }}">
{{--                    @else--}}
{{--                    <img src="/img/no_image.png" width="250px" height="350px" class="card-img-top" alt="{{ __('news/list.no_image') }}">--}}
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $value['title'] }}</h5>
                    {{--<p class="card-text">{{ mb_strimwidth(strip_tags($value['text']), 0, 150, '...') }}</p>--}}
                    <p class="card-text">{{ mb_strimwidth(strip_tags(str_replace('&nbsp;', ' ', $value['text'])), 0, 150, '...') }}</p>
                    <a href="/news/post/{{ $value['id'] }}">{{ __('news/list.more') }}</a>
                </div>
                <div class="card-footer text-muted">
                    <p class="card-text">
                        <small class="text-muted" title={{ __('news/list.news_author') }}><i class="fas fa-user"></i> {{ __('news/list.author') }} <a href="#">{{ $value['user']['last_name'].' '.$value['user']['first_name'].' '.$value['user']['middle_name'] }}</a></small>
                    </p>
                    <p class="card-text">
                        <small class="text-muted" title="{{ __('news/list.date_publication') }}"><i class="fas fa-calendar-alt"></i> {{ __('news/list.date_time') }} <a href="#">{{ $value['created_at'] }}</a></small>
                        <small class="float-right" title="{{ __('news/list.number_views') }}"><i class="fas fa-eye"></i> {{ $value['views'] }}</small>
                    </p>
                </div>
            </div>
        @empty
                {{ __('news/list.no_news') }}
        @endforelse
    </div>

    {{ $news->render() }}
@endsection