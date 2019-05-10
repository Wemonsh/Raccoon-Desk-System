@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('inventoryIndex') }}">Активы предприятия</a></li>
            <li class="breadcrumb-item"><a href="{{ route('manufacturesIndex') }}">Производители</a></li>
            <li class="breadcrumb-item active" aria-current="page">Редактировать производителя</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>Редактировать производителя</h1>
    <hr>
    {!! Form::open(array('route' => array('manufacturesEdit', $id), 'method' => 'POST', 'files' => 'true')) !!}

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
            {!! Form::text('name', $manufacture->name, ['class' => 'form-control']) !!}
            {!! $errors->first('name', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Описание:') !!}
        <div>
            {!! Form::text('description', $manufacture->description, ['class' => 'form-control']) !!}
            {!! $errors->first('description', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        <label for="image">Логотип</label>
        <br>
        @if($manufacture->logotype != null)
            <img src="{{ asset('/storage/' . $manufacture->logotype) }}" class="card-img-top rounded" style="object-fit: cover; width: 300px; height: 250px;">
            @else
            <img src="/img/no_image.png" width="100px" height="100px" style="object-fit: cover; width: 300px; height: 250px;" class="mr-3 rounded" alt="Изображение отсутствует">
        @endif
        <hr>
    </div>

    <div class="form-group">
        {!! Form::label('logotype', 'Изменить логотип') !!}
        {!! Form::file('logotype', ['id' => 'logotype', 'class' => 'form-control-file']) !!}
        {!! $errors->first('logotype', '<p class="alert alert-danger">:message</p>') !!}
    </div>

    {!! Form::submit('Изменить', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
@endsection

