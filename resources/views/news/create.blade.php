@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('news/post.main') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('news') }}">{{ __('news/post.news') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Добавление новости</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>{{ __('news/create.add_news') }}</h1>
    <hr>
    <form method="post" action="{{ route('createNews') }}" enctype="multipart/form-data">
        @csrf

        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @elseif(Session::has('warning'))
            <div class="alert alert-danger">
                {{ Session::get('warning') }}
            </div>
        @endif

        <div class="form-group">
            <label for="title">{{ __('news/create.title') }}</label>
            <input name="title" type="text" class="form-control" id="title" placeholder="{{ __('news/create.enter_title') }}">
            {!! $errors->first('title', '<p class="alert alert-danger">:message</p>') !!}
        </div>
        <div class="form-group">
            <label for="id_category">{{ __('news/create.category') }}</label>
            <select name="id_category" class="form-control" id="id_category">
                @foreach($category as $value)
                    <option value="{{ $value->id }}">{{ $value->title }}</option>
                @endforeach
            </select>
            {!! $errors->first('id_category', '<p class="alert alert-danger">:message</p>') !!}
        </div>
        <div class="form-group">
            <label for="text">{{ __('news/create.content') }}</label>
            <textarea name="text" class="form-control" id="text" rows="12"></textarea>
            {!! $errors->first('text', '<p class="alert alert-danger">:message</p>') !!}
        </div>
        <div class="form-group">
            <label for="image">{{ __('news/create.image') }}</label>
            <input name="image" type="file" class="form-control-file" id="image">
            {!! $errors->first('image', '<p class="alert alert-danger">:message</p>') !!}
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