@extends('layouts.default')

@section('content')
    <h1>{{ __('news/create.add_new') }}</h1>
    <hr>
    <form method="post" action="{{ route('createNews') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">{{ __('news/create.title') }}</label>
            <input name="title" type="text" class="form-control" id="title" placeholder="{{ __('news/create.enter_title') }}">
        </div>
        <div class="form-group">
            <label for="id_category">{{ __('news/create.category') }}</label>
            <select name="id_category" class="form-control" id="id_category">
                @foreach($category as $value)
                    <option value="{{ $value->id }}">{{ $value->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="text">{{ __('news/create.content') }}</label>
            <textarea name="text" class="form-control" id="text" rows="12"></textarea>
        </div>
        <div class="form-group">
            <label for="image">{{ __('news/create.image') }}</label>
            <input name="image" type="file" class="form-control-file" id="image">
        </div>
        <button type="submit" class="btn btn-primary">{{ __('news/create.create') }}</button>
    </form>

    <script>
        $(document).ready(function() {
            $('#text').summernote({
                height: 300,
                lang: 'ru-RU',
                placeholder: '{{ __('news/create.enter_title') }}'
            });
        });
    </script>
@endsection