@extends('layouts.default')

@section('content')

<h1>{{ __('main/home.main') }}</h1>
<hr>
<p>@lang('main/home.system_description')</p>

<div class="row">
    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="mr-5">{{ $users_count }} {{ __('main/home.users') }}</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{ route('phonesIndex') }}">
                <span class="float-left">{{ __('main/home.more') }}</span>
                <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
            </a>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-fw fa-book"></i>
                </div>
                <div class="mr-5">{{ $articles_count }} {{ __('main/home.articles') }}</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{ route('knowledge') }}">
                <span class="float-left">{{ __('main/home.to_knowledge_base') }}</span>
                <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
            </a>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-headset"></i>
                </div>
                <div class="mr-5">{{ $requests_count }} {{ __('main/home.applications_to_support') }}</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{ route('requestsCreate') }}">
                <span class="float-left">{{ __('main/home.contact_support') }}</span>
                <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
            </a>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-fw fa-calendar-alt"></i>
                </div>
                <div class="mr-5">{{ $events_count }} {{ __('main/home.upcoming_month_events') }}</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{ route('events.index') }}">
                <span class="float-left">{{ __('main/home.more') }}</span>
                <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
            </a>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-md-9">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-chart-area"></i>
                {{ __('main/home.user_requests_comparison') }}</div>
            <div class="card-body">
                <canvas id="myAreaChart" width="100%" height="30"></canvas>
            </div>
            <div class="card-footer small text-muted">{{ __('main/home.updated') }} {{ date('Y-m-d H:i:s') }}</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-chart-pie"></i>
                {{ __('main/home.applications_percentage') }}</div>
            <div class="card-body">
                <canvas id="myPieChart" width="100%" height="100"></canvas>
            </div>
            <div class="card-footer small text-muted">{{ __('main/home.updated') }} {{ date('Y-m-d H:i:s') }}</div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mb-3">
            <h5 class="card-header">{{ __('main/home.news') }}</h5>

            <ul class="list-unstyled mt-1 ml-1">

                @forelse($news as $item)
                    <li class="media my-2">
                        @if(@getimagesize(asset('/storage/' . $item['image'])))
                            <img src="{{ asset('/storage/' . $item['image']) }}" width="100px" height="100px" style="object-fit: cover;" class="mr-3 rounded" alt="{{ __('main/home.image') }}">
                        @else
                            <img src="/img/no_image.png" width="100px" height="100px" style="object-fit: cover;" class="mr-3 rounded" alt="{{ __('main/home.image') }}">
                        @endif
                        <div class="media-body">
                            <h5 class="mt-0 mb-1">{{ $item['title'] }}</h5>
                            {{ mb_strimwidth(strip_tags(str_replace('&nbsp;', ' ', $item['text'])), 0, 350, '...') }}
                            <a href="/news/post/{{ $item['id'] }}"><small>{{ __('main/home.more') }}</small></a>
                        </div>
                    </li>
                @empty
                    <div class="alert alert-info" role="alert">
                        <p>{{ __('main/home.no_news') }}</p>
                    </div>
                @endforelse

            </ul>

        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <h5 class="card-header">{{ __('main/home.articles_2') }}</h5>

            <ul class="list-unstyled mt-1 ml-1">

                @forelse($articles as $item)
                    <li class="media my-2">
                        <img src="/img/no_article_image.svg" width="100px" height="100px" class="mr-3 rounded" alt="{{ __('main/home.image') }}">
                        <div class="media-body">
                            <h5 class="mt-0 mb-1">{{ $item['title'] }}</h5>
                            {{ mb_strimwidth(strip_tags(str_replace('&nbsp;', ' ', $item['text'])), 0, 350, '...') }}
                            <a href="{{ route('knowledgeShow', $item['id']) }}"><small>{{ __('main/home.more') }}</small></a>
                        </div>
                    </li>
                @empty
                    <div class="alert alert-info" role="alert">
                        <p>{{ __('main/home.no_articles') }}</p>
                    </div>
                @endforelse

            </ul>

        </div>
    </div>
</div>
@endsection
