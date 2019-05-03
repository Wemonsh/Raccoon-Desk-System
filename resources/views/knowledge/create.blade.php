@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('knowledge/show.main') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('knowledge') }}">{{ __('knowledge/show.knowledge_base') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Добавление статьи</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>{{ __('knowledge/create.add_article') }}</h1>
    <hr>
    <form method="post" action="{{ route('knowledgeCreate') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">{{ __('knowledge/create.title') }}</label>
            <input name="title" type="text" class="form-control" id="title" placeholder="{{ __('knowledge/create.enter_title') }}">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" name="pinned" class="form-check-input" id="pinned" value="1">
            <label class="form-check-label" for="pinned">{{ __('knowledge/create.pin_article') }}</label>
        </div>
        <div class="form-group">
            <label for="id_category">{{ __('knowledge/create.category') }}</label>
            <select name="id_category" class="form-control" id="id_category">
                @foreach($category as $value)
                    <option value="{{ $value->id }}">{{ $value->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="text">{{ __('knowledge/create.content') }}</label>
            <textarea name="text" class="form-control" id="text" rows="12"></textarea>
        </div>
        <div class="form-group">
            <label for="files">{{ __('knowledge/create.attachments') }}</label>
            <input type="file" name="file[]" class="form-control-file" id="files" multiple>
        </div>
        <button type="submit" class="btn btn-primary">{{ __('knowledge/create.create') }}</button>
    </form>

    <script>
        $(document).ready(function() {
            $('#text').summernote({
                height: 300,
                lang: 'ru-RU',
                placeholder: '{{ __('knowledge/create.enter_article_content') }}'
            });
        });
    </script>
@endsection