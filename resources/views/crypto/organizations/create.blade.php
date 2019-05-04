@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('crypto') }}">Учет СКЗИ</a></li>
            <li class="breadcrumb-item"><a href="{{ route('cryptoOrganizationsIndex') }}">Организации</a></li>
            <li class="breadcrumb-item active" aria-current="page">Добавление организации</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>Добавление организации</h1>
    <hr>
    {!! Form::open(array('route' => 'cryptoOrganizationsCreate', 'method' => 'POST', 'files' => 'true')) !!}

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
        {!! Form::label('name', 'Название организации:') !!}
        <div>
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
            {!! $errors->first('name', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <hr>
    {!! Form::label('address_label', 'Адрес:') !!}
    <div class="form-group">
        <!-- TODO Испрвить id -->
        <div class="form-group">
            {!! Form::label('address_street', 'Название улицы, номер дома, номер офиса/помещения') !!}
            <div>
                {!! Form::text('address[]', null, ['class' => 'form-control']) !!}
                {!! $errors->first('address[]', '<p class="alert alert-danger">:message</p>') !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('address_street', 'Название населенного пункта (города, послека и т.п.)') !!}
            <div>
                {!! Form::text('address[]', null, ['class' => 'form-control']) !!}
                {!! $errors->first('address[]', '<p class="alert alert-danger">:message</p>') !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('address_street', 'Название района') !!}
            <div>
                {!! Form::text('address[]', null, ['class' => 'form-control']) !!}
                {!! $errors->first('address[]', '<p class="alert alert-danger">:message</p>') !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('address_street', 'Название республики, края, области, автономного округа (области)') !!}
            <div>
                {!! Form::text('address[]', null, ['class' => 'form-control']) !!}
                {!! $errors->first('address[]', '<p class="alert alert-danger">:message</p>') !!}
            </div>
        </div><div class="form-group">
            {!! Form::label('address_street', 'Название страны') !!}
            <div>
                {!! Form::text('address[]', null, ['class' => 'form-control']) !!}
                {!! $errors->first('address[]', '<p class="alert alert-danger">:message</p>') !!}
            </div>
        </div><div class="form-group">
            {!! Form::label('address_street', 'Почтовый индекс') !!}
            <div>
                {!! Form::text('address[]', null, ['class' => 'form-control']) !!}
                {!! $errors->first('address[]', '<p class="alert alert-danger">:message</p>') !!}
            </div>
        </div>
    </div>
    <hr>

    <div class="form-group">
        {!! Form::label('phone', 'Телефон:') !!}
        <div>
            {!! Form::text('phone', null, ['class' => 'form-control']) !!}
            {!! $errors->first('phone', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('email', 'E-Mail адрес:') !!}
        <div>
            {!! Form::text('email', null, ['class' => 'form-control']) !!}
            {!! $errors->first('email', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('site', 'Сайт:') !!}
        <div>
            {!! Form::text('site', null, ['class' => 'form-control']) !!}
            {!! $errors->first('site', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    {!! Form::submit('Добавить', ['class' => 'btn btn-primary mb-3']) !!}

    {!! Form::close() !!}
@endsection