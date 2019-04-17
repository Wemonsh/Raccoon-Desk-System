@extends('layouts.crypto')

@section('content')
    <h1>Добавление носителя ключевой информации</h1>

    <form method="post" action="{{ route('cryptoStoragesCreate') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="serial_number">Серийный номер</label>
            <input name="serial_number" type="text" class="form-control" id="serial_number" placeholder="Введите серийный номер">
        </div>
        <div class="form-group">
            <label for="comment">Комментарий</label>
            <input name="comment" type="text" class="form-control" id="comment" placeholder="Введите комментарий">
        </div>

        <button type="submit" class="btn btn-primary">Создать</button>
    </form>

@endsection