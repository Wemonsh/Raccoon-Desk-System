@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('crypto') }}">Учет СКЗИ</a></li>
            <li class="breadcrumb-item"><a href="{{ route('cryptoCertificatesIndex') }}">Ключевая информация</a></li>
            <li class="breadcrumb-item active" aria-current="page">Добавление</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>Добавление ключевой информации</h1>
    <hr>
    {!! Form::open(array('route' => 'cryptoCertificatesCreate', 'method' => 'POST', 'files' => 'true')) !!}

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
            {!! Form::text('serial_number', null, ['class' => 'form-control']) !!}
            {!! $errors->first('serial_number', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('id_organization', 'Организация:') !!}
        <div>
            {!! Form::select('id_organization', $organizations, null, ['class' => 'form-control']) !!}
            {!! $errors->first('id_organization', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('id_user', 'Пользователь:') !!}
        <div>
            {!! Form::select('id_user', $users, null, ['class' => 'form-control']) !!}
            {!! $errors->first('id_user', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('id_assignment', 'Назначение ключевой информации:') !!}
        <div>
            {!! Form::select('id_assignment', $assignments, null, ['class' => 'form-control']) !!}
            {!! $errors->first('id_assignment', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('file', 'Файл') !!}
        {!! Form::file('file', ['id' => 'fil', 'class' => 'form-control-file']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('date_from', 'Дата начала действия договора:') !!}
        <div>
            {!! Form::input('date', 'date_from', null, ['class' => 'form-control']) !!}
            {!! $errors->first('date_from', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('date_to', 'Дата окончания действия договора:') !!}
        <div>
            {!! Form::input('date', 'date_to', null, ['class' => 'form-control']) !!}
            {!! $errors->first('date_to', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    {!! Form::submit('Добавить', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
@endsection
