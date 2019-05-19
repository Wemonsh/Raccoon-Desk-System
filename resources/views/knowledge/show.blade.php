@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('knowledge/show.main') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('knowledge') }}">{{ __('knowledge/show.knowledge_base') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('knowledgeCategory', $article['knowledge_category']['id']) }}">{{ $article['knowledge_category']['title'] }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $article['title'] }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-9">
            <div class="card mb-3">
                <div class="card-body">
                    <h1>{{ $article['title'] }}</h1>
                    <hr>
                    <div class="content">
                        {!! $article['text'] !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-3">
            <div class="card">
                <div class="card-header">{{ __('knowledge/show.info') }}</div>
                <div class="card-body">
                    <p>{{ __('knowledge/show.date_create') }} {{ $article['created_at'] }}</p>
                    <p>{{ __('knowledge/show.date_edit') }} {{ $article['updated_at'] }}</p>
                    <p>{{ __('knowledge/show.views_number') }} {{ $article['views'] }}</p>
                    <p>{{ __('knowledge/show.author') }} <a href="#">{{ $article['user']['last_name'].' '.$article['user']['first_name'].' '.$article['user']['middle_name'] }}</a></p>
                </div>
            </div>

            @if($article['files'] != null)
                <div class="card mt-3">
                    <div class="card-header">{{ __('knowledge/show.attachments') }}</div>
                    <div class="card-body">
                        @foreach(json_decode($article['files']) as $file)
                            <p><a href="{{ asset('/storage/' . $file->path) }}">{{ $file->name }}</a></p>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>



@endsection