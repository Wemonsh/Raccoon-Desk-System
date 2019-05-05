@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('inventoryIndex') }}">Активы предприятия</a></li>
            <li class="breadcrumb-item"><a href="{{ route('organizationsIndex') }}">Организации</a></li>
            <li class="breadcrumb-item active" aria-current="page">Редактирование организации</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>Редактирование организации</h1>
    <hr>
    {!! Form::open(array('route' => array('organizationsEdit', $id), 'method' => 'POST', 'files' => 'true')) !!}

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
            {!! Form::text('name', $organization->name, ['class' => 'form-control']) !!}
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
                {!! Form::text('address[]', $organization['address'][0]->street_house_office, ['class' => 'form-control']) !!}
                {!! $errors->first('address[]', '<p class="alert alert-danger">:message</p>') !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('address_street', 'Название населенного пункта (города, послека и т.п.)') !!}
            <div>
                {!! Form::text('address[]', $organization['address'][0]->sity, ['class' => 'form-control']) !!}
                {!! $errors->first('address[]', '<p class="alert alert-danger">:message</p>') !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('address_street', 'Название района') !!}
            <div>
                {!! Form::text('address[]', $organization['address'][0]->district, ['class' => 'form-control']) !!}
                {!! $errors->first('address[]', '<p class="alert alert-danger">:message</p>') !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('address_street', 'Название республики, края, области, автономного округа (области)') !!}
            <div>
                {!! Form::text('address[]', $organization['address'][0]->region, ['class' => 'form-control']) !!}
                {!! $errors->first('address[]', '<p class="alert alert-danger">:message</p>') !!}
            </div>
        </div><div class="form-group">
            {!! Form::label('address_street', 'Название страны') !!}
            <div>
                {!! Form::text('address[]', $organization['address'][0]->country, ['class' => 'form-control']) !!}
                {!! $errors->first('address[]', '<p class="alert alert-danger">:message</p>') !!}
            </div>
        </div><div class="form-group">
            {!! Form::label('address_street', 'Почтовый индекс') !!}
            <div>
                {!! Form::text('address[]', $organization['address'][0]->postcode, ['class' => 'form-control']) !!}
                {!! $errors->first('address[]', '<p class="alert alert-danger">:message</p>') !!}
            </div>
        </div>

    </div>
    <hr>

    {!! Form::submit('Изменить', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
@endsection
