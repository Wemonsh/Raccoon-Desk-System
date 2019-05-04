@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('crypto') }}">Учет СКЗИ</a></li>
            <li class="breadcrumb-item"><a href="{{ route('cryptoMcpiModelsIndex') }}">Модели СКЗИ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Добавление модели</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>Добавление модели СКЗИ</h1>
    <hr>
    {!! Form::open(array('route' => 'cryptoMcpiModelsCreate', 'method' => 'POST', 'files' => 'true')) !!}

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
        {!! Form::label('name', 'Название:') !!}
        <div>
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
            {!! $errors->first('name', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('reg_number', 'Регистрационный номер:') !!}
        <div>
            {!! Form::text('reg_number', null, ['class' => 'form-control']) !!}
            {!! $errors->first('reg_number', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('information', 'Информация:') !!}
        <div>
            {!! Form::text('information', null, ['class' => 'form-control']) !!}
            {!! $errors->first('information', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('comment', 'Комментарий:') !!}
        <div>
            {!! Form::text('comment', null, ['class' => 'form-control']) !!}
            {!! $errors->first('comment', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('date_from', 'Дата начала действия:') !!}
        <div>
            {!! Form::date('date_from', null, ['class' => 'form-control']) !!}
            {!! $errors->first('date_from', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('date_to', 'Дата окончания действия:') !!}
        <div>
            {!! Form::date('date_to', null, ['class' => 'form-control']) !!}
            {!! $errors->first('date_to', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    {!! Form::submit('Добавить', ['class' => 'btn btn-primary mb-3']) !!}

    {!! Form::close() !!}
@endsection
