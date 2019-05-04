@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('crypto') }}">Учет СКЗИ</a></li>
            <li class="breadcrumb-item"><a href="{{ route('cryptoMcpiInstanceIndex') }}">Экземпляры СКЗИ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Добавление экземпляра</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>Добавление экземпляра СКЗИ</h1>
    <hr>
    {!! Form::open(array('route' => 'cryptoMcpiInstanceCreate', 'method' => 'POST', 'files' => 'true')) !!}

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
        {!! Form::label('id_models', 'Название модели СКЗИ:') !!}
        <div>
            {!! Form::select('id_models', $models, null, ['class' => 'form-control']) !!}
            {!! $errors->first('id_models', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('comment', 'Комментарий:') !!}
        <div>
            {!! Form::text('comment', null, ['class' => 'form-control']) !!}
            {!! $errors->first('comment', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    {!! Form::submit('Добавить', ['class' => 'btn btn-primary mb-3']) !!}

    {!! Form::close() !!}
@endsection

