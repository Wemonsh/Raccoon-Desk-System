@extends('layouts.crypto')

@section('content')
    <h1>Добавление назначения ключевой информации</h1>

    <form method="post" action="{{ route('cryptoAssignmentsCreate') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Название</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="Введите название">
        </div>
        <div class="form-group">
            <label for="comment">Комментарий</label>
            <input name="comment" type="text" class="form-control" id="comment" placeholder="Введите комментарий">
        </div>

        <button type="submit" class="btn btn-primary">Создать</button>
    </form>

@endsection