@extends('layouts.default')

@section('content')
    <h1>Новое сообщение</h1>
    <hr>
    <form method="post" action="{{ route('messageSend') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="id_receiver">Кому</label>
            <select class="form-control" name="id_receiver" id="id_receiver">
                @foreach($users as $user)
                    <option value="{{ $user['id'] }}">{{ $user['last_name'].' '.$user['first_name'].' '.$user['middle_name'] }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="message">Сообщение</label>
            <textarea class="form-control" name="message" id="message" rows="3" placeholder="Введите тескт собщения"></textarea>
        </div>

        <div class="form-group">
            <label for="files">Прикрепить файлы</label>
            <input type="file" name="file[]" class="form-control-file" id="files" multiple>
        </div>

        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>

@endsection