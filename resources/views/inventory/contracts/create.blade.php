@extends('layouts.default')

@section('content')

    <h1>Добавление договора</h1>
    <hr>

    {!! Form::open(array('route' => 'counterpartyContractsCreate', 'method' => 'POST', 'files' => 'true', 'enctype' => 'multipart/form-data')) !!}

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
        {!! Form::label('number', 'Номер договора:') !!}
        <div>
            {!! Form::text('number', null, ['class' => 'form-control']) !!}
            {!! $errors->first('number', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('name', 'Название договора:') !!}
        <div>
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
            {!! $errors->first('name', '<p class="alert alert-danger">:message</p>') !!}
        </div>
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

    <div class="form-group">
        {!! Form::checkbox('valid', '1', false, ['id' => 'valid']) !!}
        {!! Form::label('valid', 'Действующий:') !!}
    </div>

    <div class="form-group">
        {!! Form::label('comment', 'Комментарий:') !!}
        <div>
            {!! Form::text('comment', null, ['class' => 'form-control']) !!}
            {!! $errors->first('comment', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('files', 'Документы') !!}
        {!! Form::file('files[]', ['id' => 'files', 'class' => 'form-control-file', 'multiple' => 'multiple']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('id_counterparty', 'Поставщик:') !!}
        <div>
            {!! Form::select('id_counterparty', $counterparty, null, ['class' => 'form-control']) !!}
            {!! $errors->first('id_counterparty', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    {!! Form::submit('Добавить', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

@endsection
