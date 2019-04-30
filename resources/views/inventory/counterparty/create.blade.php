@extends('layouts.default')

@section('content')
    <h1>Контрагенты</h1>
    <hr>

    {!! Form::open(array('route' => 'counterpartyCreate', 'method' => 'POST', 'files' => 'true')) !!}

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
        {!! Form::label('name', 'Название контрагента:') !!}
        <div>
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
            {!! $errors->first('name', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('tin', 'ИНН:') !!}
        <div>
            {!! Form::text('tin', null, ['class' => 'form-control']) !!}
            {!! $errors->first('tin', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('code', 'КПП:') !!}
        <div>
            {!! Form::text('code', null, ['class' => 'form-control']) !!}
            {!! $errors->first('code', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('purchase', 'Покупаем:') !!}
        <div>
            {!! Form::checkbox('purchase', '1', false) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('sale', 'Продаем:') !!}
        <div>
            {!! Form::checkbox('sale', '1', false) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('tracking', 'На контроле:') !!}
        <div>
            {!! Form::checkbox('tracking', '1', false) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('comment', 'Комментарий:') !!}
        <div>
            {!! Form::text('comment', null, ['class' => 'form-control']) !!}
            {!! $errors->first('comment', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    {!! Form::submit('Добавить', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
@endsection