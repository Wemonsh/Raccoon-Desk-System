@extends('layouts.default')

@section('content')
    <h1>Новое сообщение</h1>
    <hr>
    <form action="#">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Кому</label>
            <select class="form-control" id="exampleFormControlSelect1">
            @foreach($users as $user)
                <option value="{{ $user['id'] }}">{{ $user['last_name'].' '.$user['first_name'].' '.$user['middle_name'] }}</option>
            @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Сообщение</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label for="exampleFormControlFile1">Прикрепить файлы</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1">
        </div>

        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>

@endsection