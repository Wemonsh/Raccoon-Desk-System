@extends('layouts.default')

@section('jumbotron')
    <div class="jumbotron jumbotron-fluid">
        <div class="container-fluid">
            <h1 class="display-4">{{ __('knowledge/index.knowledge_base') }}</h1>
            <p class="lead">{{ __('knowledge/index.can_we_help') }}</p>
            <form action="{{ route('knowledgeSearch') }}" method="post">
                @csrf
                <div class="input-group">
                    <input type="text" name="value" class="form-control" placeholder="{{ __('knowledge/index.request_enter') }}">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">{{ __('knowledge/index.search') }}</button>
                    </div>
                </div>
            </form>
            <hr>
            <p class="lead">{{ __('knowledge/index.no_answer') }}</p>
            <p class="lead">
                <a class="btn btn-outline-success" href="{{ route('requestsCreate') }}" role="button">{{ __('knowledge/index.create_request') }}</a>
                <a class="btn btn-outline-info" href="{{ route('requestsCreated') }}" role="button">{{ __('knowledge/index.requests_view') }}</a>
            </p>
        </div>
    </div>
@endsection

@section('content')

    <div class="card-deck">
        <div class="card">
            <div class="card-body">
                <h2><i class="fas fa-newspaper"></i> {{ __('knowledge/index.new') }}</h2>
                <ul>

                    @forelse($articleNew as $value)
                        <li><a href="{{ route('knowledgeShow', $value['id']) }}">{{ $value['title'] }}</a> <small>{{ $value['created_at'] }}</small></li>
                    @empty
                        <div class="alert alert-info" role="alert">
                            <p>{{ __('knowledge/index.no_articles') }}</p>
                        </div>
                    @endforelse

                </ul>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h2><i class="fas fa-star"></i> {{ __('knowledge/index.popular') }}</h2>
                <ul>

                    @forelse($articlePopular as $value)
                        <li><a href="{{ route('knowledgeShow', $value['id']) }}">{{ $value['title'] }}</a>  <small class="text-muted" title="{{ __('knowledge/index.views_number') }}"><i class="fas fa-eye"></i> {{ $value['views'] }}</small></li>
                    @empty
                        <div class="alert alert-info" role="alert">
                            <p>{{ __('knowledge/index.no_articles') }}</p>
                        </div>
                    @endforelse

                </ul>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h2><i class="fas fa-thumbtack"></i> {{ __('knowledge/index.pinned') }}</h2>
                <ul>

                    @forelse($articlePinned as $value)
                        <li><a href="{{ route('knowledgeShow', $value['id']) }}">{{ $value['title'] }}</a> <small>{{ $value['created_at'] }}</small></li>
                    @empty
                        <div class="alert alert-info" role="alert">
                            <p>{{ __('knowledge/index.no_articles') }}</p>
                        </div>
                    @endforelse

                </ul>
            </div>
        </div>
    </div>

    <hr>

    <div class="card-columns">

        @forelse ($knowledge as $value)
            <div class="card">
                <div class="card-body">
                    <h2>{{ $value['title'] }} <span class="badge badge-secondary" title="{{ __('knowledge/index.article_count') }}">{{ count($value['knowledge']) }}</span></h2>
                    <ul>

                        @forelse($value['knowledge'] as $value)
                            <li><a href="{{ route('knowledgeShow', $value['id']) }}">{{ $value['title'] }}</a> <small>{{ $value['created_at'] }}</small></li>
                        @empty
                            <div class="alert alert-info" role="alert">
                                <p>{{ __('knowledge/index.no_articles') }}</p>
                            </div>
                        @endforelse

                    </ul>
                </div>
            </div>
        @empty
            <p>{{ __('knowledge/index.no_categories') }}</p>
        @endforelse

    </div>
    <div class="card mb-3 mt-3">
        <div class="card-body">
            <p>{{ __('knowledge/index.knowledge_info') }}</p>
        </div>
    </div>
@endsection