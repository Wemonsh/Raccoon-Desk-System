@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('inventoryIndex') }}">Активы предприятия</a></li>
            <li class="breadcrumb-item"><a href="{{ route('typesIndex') }}">Типы МТС</a></li>
            <li class="breadcrumb-item active" aria-current="page">Добавить тип МТС</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>Добавить тип МТС</h1>
    <hr>
    {!! Form::open(array('route' => 'typesCreate', 'method' => 'POST', 'files' => 'true')) !!}

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
        {!! Form::label('name', 'Название') !!}
        <div>
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
            {!! $errors->first('name', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Описание') !!}
        <div>
            {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
            {!! $errors->first('description', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('properties', 'Параметры:') !!}
        <div>
            {!! Form::text('properties', null, ['class' => 'form-control']) !!}
            {!! $errors->first('properties', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('image', 'Фото') !!}
        {!! Form::file('image', ['id' => 'image', 'class' => 'form-control-file']) !!}
        {!! $errors->first('image', '<p class="alert alert-danger">:message</p>') !!}
    </div>

    {!! Form::submit('Добавить', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

@endsection