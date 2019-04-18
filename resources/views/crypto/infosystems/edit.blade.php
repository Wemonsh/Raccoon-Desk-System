@extends('layouts.default')

@section('content')
    <h1>Редактирование информационной системы</h1>
    <form method="post" action="{{ route('cryptoInfoSystemEdit', $id) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Название</label>
            <input name="name" type="text" class="form-control" id="name" value="{{ $info_system->name }}" placeholder="Введите название">
        </div>
        <hr>
        <div class="form-group">
            <label for="comment">Сайт</label>
            <input name="comment" type="text" class="form-control" id="comment" value="{{ $info_system->comment }}" placeholder="Введите комментарий">
        </div>

        <button type="submit" class="btn btn-primary mb-3">Изменить</button>
    </form>

@endsection
