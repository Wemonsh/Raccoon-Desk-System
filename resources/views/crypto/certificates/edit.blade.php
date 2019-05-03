@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('crypto') }}">Учет СКЗИ</a></li>
            <li class="breadcrumb-item"><a href="{{ route('cryptoCertificatesIndex') }}">Ключевая информация</a></li>
            <li class="breadcrumb-item active" aria-current="page">Редактирование</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>Редактирование ключевой информации</h1>
    <hr>
    {!! Form::open(array('route' => array('cryptoCertificatesEdit', $id), 'method' => 'POST', 'files' => 'true')) !!}

    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @elseif(Session::has('warning'))
        <div class="alert alert-danger">
            {{ Session::get('warning') }}
        </div>
    @endif

    <div class="form-group">
        {!! Form::label('serial_number', 'Серийный номер:') !!}
        <div>
            {!! Form::text('serial_number', $certificate->serial_number, ['class' => 'form-control']) !!}
            {!! $errors->first('serial_number', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('id_organization', 'Организация:') !!}
        <div>
            {!! Form::select('id_organization', $organizations, $certificate->id_organization, ['class' => 'form-control']) !!}
            {!! $errors->first('id_organization', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('id_user', 'Пользователь:') !!}
        <div>
            {!! Form::select('id_user', $users, $certificate->id_user, ['class' => 'form-control']) !!}
            {!! $errors->first('id_user', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('id_assignment', 'Назначение ключевой информации:') !!}
        <div>
            {!! Form::select('id_assignment', $assignments, $certificate->id_assignment, ['class' => 'form-control']) !!}
            {!! $errors->first('id_assignment', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        @if($certificate['file'] != null)
            <div class="card mt-3">
                <div class="card-header">Файл</div>
                <div class="card-body">
                    {{-- TODO Исправить отображение расширения файла в таблице на index !!! --}}
                    <p><a href="{{ asset('/storage/' . $certificate->file) }}">{{ $certificate->file }}</a></p>
                    <hr>
                    <div class="form-group">
                        {!! Form::label('file', 'Заменить файл') !!}
                        {!! Form::file('file', ['id' => 'file', 'class' => 'form-control-file', 'multiple' => 'multiple']) !!}
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-info" role="alert">
                <p>Файл в данной ключевой информации отсутствует</p>
            </div>
            <div class="form-group">
                {!! Form::label('file', 'Добавить файл') !!}
                {!! Form::file('file', ['id' => 'file', 'class' => 'form-control-file', 'multiple' => 'multiple']) !!}
            </div>
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('date_from', 'Дата начала действия договора:') !!}
        <div>
            {!! Form::input('date', 'date_from', $certificate->date_from, ['class' => 'form-control']) !!}
            {!! $errors->first('date_from', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('date_to', 'Дата окончания действия договора:') !!}
        <div>
            {!! Form::input('date', 'date_to', $certificate->date_to, ['class' => 'form-control']) !!}
            {!! $errors->first('date_to', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    {!! Form::submit('Изменить', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
@endsection

