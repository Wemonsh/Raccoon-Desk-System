@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('news/post.main') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('news') }}">{{ __('news/post.news') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Редактирование новости {{ $news->title }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>{{ __('news/edit.edit_news') }}</h1>
    <hr>
    <form method="post" action="{{ route('editNews', $id) }}" enctype="multipart/form-data">
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
            <label for="title">{{ __('news/edit.title') }}</label>
            <input name="title" type="text" class="form-control" id="title" value="{{ $news->title }}" placeholder="{{ __('news/edit.enter_title') }}">
            {!! $errors->first('title', '<p class="alert alert-danger">:message</p>') !!}
        </div>
        <div class="form-group">
            <label for="id_category">{{ __('news/edit.category') }}</label>
            <select name="id_category" class="form-control" id="id_category">
                @foreach($category as $value)
                    @if($news->newsCategory->id == $value->id)
                        <option selected value="{{ $value->id }}">{{ $value->title }}</option>
                    @else
                        <option value="{{ $value->id }}">{{ $value->title }}</option>
                    @endif
                @endforeach
            </select>
            {!! $errors->first('id_category', '<p class="alert alert-danger">:message</p>') !!}
        </div>
        <div class="form-group">
            <label for="text">{{ __('news/edit.content') }}</label>
            <textarea name="text" class="form-control" id="text" rows="12">{{ $news->text }}</textarea>
            {!! $errors->first('text', '<p class="alert alert-danger">:message</p>') !!}
        </div>
        <div class="form-group">
            <label for="image">{{ __('news/edit.image') }}</label>
            <br>
            @if($news->image != null)
                <img src="{{ asset('/storage/' . $news->image) }}" class="card-img-top" style="width: 100px">
            @endif
            <hr>
            <p>{{ __('news/edit.change_image') }}</p>
            <input name="image" type="file" class="form-control-file mt-3" id="image">
            {!! $errors->first('image', '<p class="alert alert-danger">:message</p>') !!}
        </div>
        <button type="submit" class="btn btn-primary">{{ __('news/edit.change') }}</button>
    </form>

    <script>
        $(document).ready(function() {
            $('#text').summernote({
                height: 300,
                lang: 'ru-RU',
                placeholder: '{{ __('news/edit.enter_title') }}'
            });
        });
    </script>
@endsection