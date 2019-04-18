@extends('layouts.crypto')

@section('content')
    <h1>Редактирование ключевой информации</h1>
    <form method="post" action="{{ route('cryptoCertificatesEdit', $id) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="serial_number">Серийный номер</label>
            <input name="serial_number" type="text" class="form-control" id="serial_number" value="{{ $certificate->serial_number }}" placeholder="Введите серийный номер">
        </div>
        <div class="form-group">
            <label for="id_organization">Организация</label>
            <select name="id_organization" class="form-control" id="id_organization">
                @foreach($organizations as $organization)
                    @if($certificate->organization->id == $organization->id)
                        <option selected value="{{ $organization->id }}">{{ $organization->name }}</option>
                    @else
                        <option value="{{ $organization->id }}">{{ $organization->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_user">Пользователь</label>
            <select name="id_user" class="form-control" id="id_user">
                @foreach($users as $user)
                    @if($certificate->user->id == $user->id)
                        <option selected value="{{ $user->id }}">{{ $user->last_name.' '.$user->first_name.' '.$user->middle_name }}</option>
                    @else
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_assignment">Назначение ключевой информации</label>
            <select name="id_assignment" class="form-control" id="id_assignment">
                @foreach($assignments as $assignment)
                    @if($certificate->assignment->id == $assignment->id)
                        <option selected value="{{ $assignment->id }}">{{ $assignment->name }}</option>
                    @else
                        <option value="{{ $assignment->id }}">{{ $assignment->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            @if($certificate->file != null)
                <div class="card mt-3">
                    <div class="card-header">Файл</div>
                    <div class="card-body">
                        <p><a href="{{ asset('/storage/' . $certificate->file) }}">{{ $certificate->file }}</a></p>
                        <hr>
                        <p>Заменить файл</p>
                        <input type="file" name="file" class="form-control-file" id="file">
                    </div>
                </div>
            @else
                <div class="alert alert-info" role="alert">
                    <p>Файлы в данной ключевой информации отсутсвуют</p>
                </div>
                <input type="file" name="file" class="form-control-file" id="files">
            @endif
        </div>
        <div class="form-group">
            <label for="date_from">Дата начала действия</label>
            <input name="date_from" type="date" class="form-control" id="date_from" value="{{ $certificate->date_from }}">
        </div>
        <div class="form-group">
            <label for="date_to">Дата окончания действия</label>
            <input name="date_to" type="date" class="form-control" id="date_to" value="{{ $certificate->date_to }}">
        </div>

        <button type="submit" class="btn btn-primary mb-3">Изменить</button>
    </form>

@endsection

