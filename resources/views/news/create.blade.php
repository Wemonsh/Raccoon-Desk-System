@extends('layouts.app')

@section('content')
    <h1>Добавление новости</h1>

    <form method="post" action="{{ route('createNews') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input name="title" type="text" class="form-control" id="title">
        </div>
        <div class="form-group">
            <label for="id_category">Категория</label>
            <select name="id_category" class="form-control" id="id_category">
                <option>1</option>
            </select>
        </div>
        <div class="form-group">
            <label for="text">Содержание</label>
            <textarea name="text" class="form-control" id="text" rows="6"></textarea>
        </div>
        <div class="form-group">
            <label for="image">Изображение</label>
            <input name="image" type="file" class="form-control-file" id="image">
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
@endsection