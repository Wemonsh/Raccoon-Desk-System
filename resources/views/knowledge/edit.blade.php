@extends('layouts.default')

@section('content')
    <h1>Редактирование статьи</h1>
    <hr>
    <form method="post" action="{{ route('knowledgeEdit', $id) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input name="title" type="text" class="form-control" id="title" value="{{ $article->title }}" placeholder="Введите название статьи">
        </div>
        <div class="form-group form-check">
            @if($article->pinned == 1)
                <input type="checkbox" name="pinned" class="form-check-input" id="pinned" value="1" checked>
                @else
                <input type="checkbox" name="pinned" class="form-check-input" id="pinned" value="1">
            @endif
            <label class="form-check-label" for="pinned">Закрепить статью</label>
        </div>
        <div class="form-group">
            <label for="id_category">Категория</label>
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
            <label for="text">Содержание</label>
            <textarea name="text" class="form-control" id="text" rows="12">{{ $article->text }}</textarea>
        </div>

        <div class="form-group">
            @if($article['files'] != null)
                <div class="card mt-3">
                    <div class="card-header">Приложения</div>
                    <div class="card-body">
                        @foreach(json_decode($article['files']) as $file)
                            <p><a href="{{ asset('/storage/' . $file->path) }}">{{ $file->name }}</a></p>
                        @endforeach
                            <hr>
                            <p>Добавить новые приложения</p>
                            <input type="file" name="file[]" class="form-control-file" id="files" multiple>
                    </div>
                </div>
                @else
                <div class="alert alert-info" role="alert">
                    <p>Файлы в данной статье отсутсвуют</p>
                </div>
                <input type="file" name="file[]" class="form-control-file" id="files" multiple>
            @endif
        </div>

        <button type="submit" class="btn btn-primary mb-3">Изменить</button>
    </form>

    <script>
        $(document).ready(function() {
            $('#text').summernote({
                height: 300,
                lang: 'ru-RU',
                placeholder: 'Введите название статьи'
            });
        });
    </script>
@endsection