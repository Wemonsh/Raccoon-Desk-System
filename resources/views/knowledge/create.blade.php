@extends('layouts.app')

@section('content')
    <h1>Добавление статьи</h1>

    <form method="post" action="{{ route('knowledgeCreate') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input name="title" type="text" class="form-control" id="title">
        </div>
        <div class="form-group">
            <label for="id_category">Категория</label>
            <select name="id_category" class="form-control" id="id_category">
                @foreach($category as $value)
                    <option value="{{ $value->id }}">{{ $value->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="text">Содержание</label>
            <textarea name="text" class="form-control" id="text" rows="12"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>

    <script>
        $(document).ready(function() {
            $('#text').summernote({
                height: 300,
                lang: 'ru-RU'
            });
        });
    </script>
@endsection