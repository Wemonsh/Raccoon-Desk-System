@extends('layouts.crypto')

@section('content')
    <h1>Добавление ключевой информации</h1>

    <form method="post" action="{{ route('cryptoCertificatesCreate') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="serial_number">Серийный номер</label>
            <input name="serial_number" type="text" class="form-control" id="serial_number" placeholder="Введите серийный номер">
        </div>
        <div class="form-group">
            <label for="id_organization">Организация</label>
            <select name="id_organization" class="form-control" id="id_organization">
                @foreach($organizations as $organization)
                    <option value="{{ $organization->id }}">{{ $organization->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_user">Пользователь</label>
            <select name="id_user" class="form-control" id="id_user">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->last_name.' '.$user->first_name.' '.$user->middle_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_assignment">Назначение ключевой информации</label>
            <select name="id_assignment" class="form-control" id="id_assignment">
                @foreach($assignments as $assignment)
                    <option value="{{ $assignment->id }}">{{ $assignment->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="file">Файл</label>
            <input name="file" type="file" class="form-control-file" id="file">
        </div>
        <div class="form-group">
            <label for="date_from">Дата начала действия</label>
            <input name="date_from" type="date" class="form-control" id="date_from">
        </div>
        <div class="form-group">
            <label for="date_to">Дата окончания действия</label>
            <input name="date_to" type="date" class="form-control" id="date_to">
        </div>

        <button type="submit" class="btn btn-primary">Создать</button>
    </form>

@endsection
