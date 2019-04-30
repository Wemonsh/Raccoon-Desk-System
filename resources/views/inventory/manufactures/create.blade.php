@extends('layouts.default')

@section('content')
    <h1>Добавить производителя</h1>
    <hr>

    {!! Form::open(array('route' => 'manufacturesCreate', 'method' => 'POST', 'files' => 'true')) !!}

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
        {!! Form::label('name', 'Название производителя:') !!}
        <div>
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
            {!! $errors->first('name', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Описание:') !!}
        <div>
            {!! Form::text('description', null, ['class' => 'form-control']) !!}
            {!! $errors->first('description', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('logotype', 'Логотип') !!}
        {!! Form::file('logotype', ['id' => 'logotype', 'class' => 'form-control-file']) !!}
    </div>

    {!! Form::submit('Добавить', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
@endsection
