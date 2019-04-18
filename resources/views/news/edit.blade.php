@extends('layouts.default')

@section('content')
    <h1>Редактирование новости</h1>

    <form method="post" action="{{ route('editNews', $id) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input name="title" type="text" class="form-control" id="title" value="{{ $news->title }}" placeholder="Введите название статьи">
        </div>
        <div class="form-group">
            <label for="id_category">Категория</label>
            <select name="id_category" class="form-control" id="id_category">
                {{--<option value="{{ $news->newsCategory->id }}">{{ $news->newsCategory->title }}</option>--}}
                @foreach($category as $value)
                    @if($news->newsCategory->id == $value->id)
                        <option selected value="{{ $value->id }}">{{ $value->title }}</option>
                    @else
                        <option value="{{ $value->id }}">{{ $value->title }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="text">Содержание</label>
            <textarea name="text" class="form-control" id="text" rows="12">{{ $news->text }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Изображение</label>
            <br>
            @if($news->image != null)
                <img src="{{ asset('/storage/' . $news->image) }}" class="card-img-top" style="width: 100px">
            @endif

            <input name="image" type="file" class="form-control-file mt-3" id="image">
        </div>
        <button type="submit" class="btn btn-primary">Изменить</button>
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