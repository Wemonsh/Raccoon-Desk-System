@extends('layouts.default')

@section('content')
    <h1>Редактировать контрагента</h1>
    <hr>

    {!! Form::open(array('route' => array('counterpartyEdit', $id), 'method' => 'POST', 'files' => 'true')) !!}

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
            {!! Form::text('name', $counterparty->name, ['class' => 'form-control']) !!}
            {!! $errors->first('name', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('tin', 'ИНН:') !!}
        <div>
            {!! Form::text('tin', $counterparty->tin, ['class' => 'form-control']) !!}
            {!! $errors->first('tin', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('code', 'КПП:') !!}
        <div>
            {!! Form::text('code', $counterparty->code, ['class' => 'form-control']) !!}
            {!! $errors->first('code', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::checkbox('purchase', $counterparty->purchase, $counterparty->purchase, ['id' => 'purchase']) !!}
        {!! Form::label('purchase', 'Покупаем:') !!}
    </div>

    <div class="form-group">
        {!! Form::checkbox('sale', $counterparty->sale, $counterparty->sale, ['id' => 'sale']) !!}
        {!! Form::label('sale', 'Продаем:') !!}
    </div>

    <div class="form-group">
        {!! Form::checkbox('tracking', $counterparty->tracking, $counterparty->tracking, ['id' => 'tracking']) !!}
        {!! Form::label('tracking', 'На контроле:') !!}
    </div>

    <div class="form-group">
        {!! Form::label('comment', 'Комментарий:') !!}
        <div>
            {!! Form::text('comment', $counterparty->comment, ['class' => 'form-control']) !!}
            {!! $errors->first('comment', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    {!! Form::submit('Изменить', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
@endsection
