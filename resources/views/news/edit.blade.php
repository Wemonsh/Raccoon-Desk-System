@extends('layouts.app')

@section('content')
    <h1>Редактирование новости</h1>

    <form method="post" action="{{ route('editNews', $id) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input name="title" type="text" class="form-control" id="title" value="{{ $news->title }}">
        </div>
        <div class="form-group">
            <label for="id_category">Категория</label>
            <select name="id_category" class="form-control" id="id_category">
                <option value="{{ $news->newsCategory->id }}">{{ $news->newsCategory->title }}</option>
            </select>
        </div>
        <div class="form-group">
            <label for="text">Содержание</label>
            <textarea name="text" class="form-control" id="text" rows="6">{{ $news->text }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Изображение</label>
            <br>
            @if($news->image != null)
                <img src="{{ asset('/storage/' . $news->image) }}" class="card-img-top" style="width: 100px">
            @endif

            <input name="image" type="file" class="form-control-file" id="image">
        </div>
        <button type="submit" class="btn btn-primary">Изменить</button>
    </form>
@endsection