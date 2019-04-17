@extends('layouts.crypto')

@section('content')
    <h1>Редактирование носителя ключевой информации</h1>
    <form method="post" action="{{ route('cryptoStoragesEdit', $id) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="serial_number">Серийный номер</label>
            <input name="serial_number" type="text" class="form-control" id="serial_number" value="{{ $storage->serial_number }}" placeholder="Введите серийный номер">
        </div>
        <hr>
        <div class="form-group">
            <label for="comment">Сайт</label>
            <input name="comment" type="text" class="form-control" id="comment" value="{{ $storage->comment }}" placeholder="Введите комментарий">
        </div>

        <button type="submit" class="btn btn-primary mb-3">Изменить</button>
    </form>

@endsection