@extends('layouts.default')

@section('content')
    <h1>{{ __('knowledge/edit.edit_news') }}</h1>
    <hr>
    <form method="post" action="{{ route('knowledgeEdit', $id) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">{{ __('knowledge/edit.title') }}</label>
            <input name="title" type="text" class="form-control" id="title" value="{{ $article->title }}" placeholder="{{ __('knowledge/edit.enter_title') }}">
        </div>
        <div class="form-group form-check">
            @if($article->pinned == 1)
                <input type="checkbox" name="pinned" class="form-check-input" id="pinned" value="1" checked>
                @else
                <input type="checkbox" name="pinned" class="form-check-input" id="pinned" value="1">
            @endif
            <label class="form-check-label" for="pinned">{{ __('knowledge/edit.secure_news') }}</label>
        </div>
        <div class="form-group">
            <label for="id_category">{{ __('knowledge/edit.category') }}</label>
            <select name="id_category" class="form-control" id="id_category">
                @foreach($category as $value)
                    @if($article->knowledgeCategory->id == $value->id)
                        <option selected value="{{ $value->id }}">{{ $value->title }}</option>
                    @else
                        <option value="{{ $value->id }}">{{ $value->title }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="text">{{ __('knowledge/edit.content') }}</label>
            <textarea name="text" class="form-control" id="text" rows="12">{{ $article->text }}</textarea>
        </div>

        <div class="form-group">
            @if($article['files'] != null)
                <div class="card mt-3">
                    <div class="card-header">{{ __('knowledge/edit.attachments') }}</div>
                    <div class="card-body">
                        @foreach(json_decode($article['files']) as $file)
                            <p><a href="{{ asset('/storage/' . $file->path) }}">{{ $file->name }}</a></p>
                        @endforeach
                            <hr>
                            <p>{{ __('knowledge/edit.add_attachments') }}</p>
                            <input type="file" name="file[]" class="form-control-file" id="files" multiple>
                    </div>
                </div>
                @else
                <div class="alert alert-info" role="alert">
                    <p>{{ __('knowledge/edit.no_news_files') }}</p>
                </div>
                <input type="file" name="file[]" class="form-control-file" id="files" multiple>
            @endif
        </div>

        <button type="submit" class="btn btn-primary mb-3">{{ __('knowledge/edit.change') }}</button>
    </form>

    <script>
        $(document).ready(function() {
            $('#text').summernote({
                height: 300,
                lang: 'ru-RU',
                placeholder: '{{ __('knowledge/edit.enter_title') }}'
            });
        });
    </script>
@endsection